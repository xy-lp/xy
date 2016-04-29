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
        $this->display('about');
    }

    /*
     * 碎碎念
     */
    public function part1(){
        $this->display('part');
    }

    /*
     * 技术探讨
     */
    public function part2(){
        $this->display('list');
    }

    /*
     * 慢生活
     */
    public function part3(){
        $this->display('part');
    }

    /**
     * 查看文章详情
     */
    public function detail(){
        $id=(int)I('get.id');

         if(!empty($id)){
            $info=M('Article')->find();
            if(empty($info)){
                $this->error('not found','',1);
            }
         }else{
             $this->error('without id or id=0','',1);
         }
        $this->assign('info',$info);
        $this->display();
    }
}