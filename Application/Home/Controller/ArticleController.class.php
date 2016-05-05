<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/29
 * Time: 17:35
 */
namespace Home\Controller;
use Think\Controller;
class ArticleController extends BaseController{
    /*
     * 你看我
     */
    public function about_me(){
       $about=M('article')->where('cat_id=2')->find();//p($about);
        $this->assign('about',$about);
        $this->display('about');
    }

    /*
     * 碎碎念
     */
    public function part1($page_id=1){
        $top=$this->get_top_list();
        $list= M('article')->order('article_id desc')->where(array('status'=>0,'is_show'=>0,'cat_id'=>$top[2]['cat_id']))->select();
        foreach($list as $k => $v){
            $cat=M('category')->field('cat_name')->find($v['cat_id']);
            $source=M('source')->field('sre_name')->find($v['sre_id']);
            $list[$k]['cat_name']=$cat['cat_name'];
            $list[$k]['sre_name']=$source['sre_name'];
        }
        $data=data_page($list,$page_id);
        $news=$this->get_new_list();
        $hots=$this->get_hot_list();
        $this->assign('cat_name',$top[2]['cat_name']);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('news',$news);
        $this->assign('hots',$hots);
        $this->display('list');
    }

    /*
     * 技术探讨
     */
    public function part2($type=false,$page_id=1){
        //列表
        $top=$this->get_top_list();
        $top_id=$top[3]['cat_id'];
        $top_childs=M('category')->field('cat_id')->where(array('cat_pid'=>$top_id))->select();
        foreach($top_childs as $v){
            $childs[]=$v['cat_id'];
        }
        $ids=$childs;
        $ids[]=$top_id;
        $part2=array(
            'status'    =>array('eq','0'),
            'is_show'   =>array('eq','0'),
            'cat_id'    =>array('in',$ids),
        );
        $list= M('article')->order('article_id desc')->where($part2)->select();
        foreach($list as $k => $v){
            $cat=M('category')->field('cat_name')->find($v['cat_id']);
            $source=M('source')->field('sre_name')->find($v['sre_id']);
            $list[$k]['cat_name']=$cat['cat_name'];
            $list[$k]['sre_name']=$source['sre_name'];
        }
        $data=data_page($list,$page_id);
        $this->assign('cat_name',$top[2]['cat_name']);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);

        //右导航
        $news=$this->get_new_list();
        $hots=$this->get_hot_list();
        $left_list=M('category')->field('cat_id,cat_name,url')->order('sort_order')->where(array('is_show'=>0,'cat_pid'=>$top_id))->select();
        $this->assign('left_list',$left_list);
        $this->assign('news',$news);
        $this->assign('hots',$hots);
        //p($left_list);
        $this->display('list');
    }

    /*
     * 慢生活
     */
    public function part3($page_id=1){
        $top=$this->get_top_list();
        $list= M('article')->order('article_id desc')->where(array('status'=>0,'is_show'=>0,'cat_id'=>$top[4]['cat_id']))->select();
        foreach($list as $k => $v){
            $cat=M('category')->field('cat_name')->find($v['cat_id']);
            $source=M('source')->field('sre_name')->find($v['sre_id']);
            $list[$k]['cat_name']=$cat['cat_name'];
            $list[$k]['sre_name']=$source['sre_name'];
        }
        $data=data_page($list,$page_id);
        $news=$this->get_new_list();
        $hots=$this->get_hot_list();
        $this->assign('cat_name',$top[4]['cat_name']);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->assign('news',$news);
        $this->assign('hots',$hots);
        $this->display('list');
    }

    /**
     * 查看文章详情
     */
    public function detail(){
        $id=(int)I('get.id');
         if(!empty($id)){
            $info=M('Article')->where('article_id='.$id)->find();
            if(empty($info)){
                $this->error('not found','',1);
            }
         }else{
             $this->error('without id or id=0','',1);
         }
        $hits=M('article')->where('article_id='.$id)->field('hits')->find();//p($hits);
        $hits['hits']+=1;//p($hits['hits']);
        M('article')->save(array(
            'article_id'=>$id,
            'hits'=>$hits['hits']
        ));
        $this->assign('info',$info);//p($info);
        $this->display();
    }


}