<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class IndexController extends BaseController {
    public function index($page_id=1){
        $model=M('article');
        $cat_model=M('category');
        //推荐文章
        $hit_list= $model->order('hits desc')->limit('3')->select();
        $this->assign('hit_list',$hit_list);

        //文章列表
        $list= $model->order('add_time desc')->select();
        foreach($list as $k => $v){
            $cat=$cat_model->field('cat_name')->find($v['cat_id']);
            $source=M('source')->field('sre_name')->find($v['sre_id']);
            $list[$k]['cat_name']=$cat['cat_name'];
            $list[$k]['sre_name']=$source['sre_name'];
        }
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);

        //博客分类
        $cat_list=$cat_model->where(array('cat_pid'=>0,'is_show'=>0))->select();
        $this->assign('cat_list',$cat_list);
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
