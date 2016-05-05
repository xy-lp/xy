<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends BaseController {
    public function index($page_id=1){
        $model=D('article');
        $cat_model=M('category');

        //推荐文章
        $top_article= $model->order('article_id desc')->where(array('is_top'=>0,'status'=>0,'is_show'=>0))->limit('3')->select();
        if(sizeof($top_article)<3){
            $limit=3-sizeof($top_article);
            foreach($top_article as $v){
                $ids[]=$v['article_id'];
            }
            $twhere['status']=['eq','0'];
            $twhere['is_show']=['eq','0'];
            $twhere['article_id']=['not in',$ids];
            $tlist1= $model->order('article_id desc')->where($twhere)->limit($limit)->select();
            if(!empty($tlist1)){
                $top_article=array_merge($top_article,$tlist1);
            }
        }
        $this->assign('top_article',$top_article);

        //文章列表:最新的五篇
        $list= $model->order('add_time desc')->limit('5')->select();//p($list);
        foreach($list as $k => $v){
            $cat=$cat_model->field('cat_name')->find($v['cat_id']);
            $source=M('source')->field('sre_name')->find($v['sre_id']);
            $list[$k]['cat_name']=$cat['cat_name'];
            $list[$k]['sre_name']=$source['sre_name'];
            $list[$k]['img_path']=$v['img_path'];
        }
        $data=data_page($list,$page_id);//p($data['list']);
        $this->assign('list',$data['list']);
        //$this->assign('page',$data['page']);

        //博客分类
        $map['is_show']=array('eq','0');
        $map['cat_pid']=array('Neq','0');
        $cat_list=$cat_model->where($map)->select();
        foreach($cat_list as $k=>$v){
            $num=M('article')->where(array('cat_id'=>$v['cat_id']))->select();
            $cat_list[$k]['num']=sizeof($num);
        }
        $this->assign('cat_list',$cat_list);

        //近期文章
        $now_list= $model->get_new();
        $this->assign('now_list',$now_list);

        //最热文章
        $hits_list= $model->get_hits();
        $this->assign('hits_list',$hits_list);
        $this->display('now');
    }
    public function article_lst(){
        $articleInfo=M('article')->select();
        $totalRows=M('article')->count('article_id');
        $listRows=10;
        //p($articleInfo);
        $page=new Page($totalRows,$listRows);
    }
}
