<?php 
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController{
    public function admin(){
        $article=M('Article')->select();
        //p($article);
        $name=M('user')->field('user_name,user_role')->where(array('user_id'=>session('uid')))->find();
        $nickname=M('user_info')->field('nickname')->find(array('user_id'=>session('uid')));
        $role_name=M('role')->field('role_name')->find($name['user_role']);
        $name['nickname']=$nickname['nickname'];
        $name['role_name']=$role_name['role_name'];
        $this->assign('name',$name);
    //p($name);
        $this->assign('article',$article);
        $this->display('index');
    }

    public function index1()
    {
        $message=M('message')->order('message_time desc')->limit('5')->select();
        $size=5;
        $article=M('Article')->order('article_id desc')->limit($size)->select();
        //p($article);
        $this->assign('article',$article);
        $this->assign('message',$message);
        $this->display('index_v1');
    }

    public function test(){
        $info=M('message')->order('message_time desc')->limit('5')->select();p($info);
        $this->assign('info',$info);
    }

}
