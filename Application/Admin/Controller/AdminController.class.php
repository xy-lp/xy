<?php 
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController{
    public function admin(){
        //最新文章
        //$article=M('Article')->order('add_time desc')->limit(8)->select();
        //$this->assign('article',$article);

        //当前用户名
        $name=M('user')->field('user_name,user_role')->where(array('user_id'=>session('uid')))->find();
        $nickname=M('user_info')->field('nickname')->find(array('user_id'=>session('uid')));
        $role_name=M('role')->field('role_name')->find($name['user_role']);
        $name['nickname']=$nickname['nickname'];
        $name['role_name']=$role_name['role_name'];
        $this->assign('name',$name);

        $this->display('index');
    }

    public function index1()
    {
        $size=10;
        //最新文章
        $article=M('Article')->order('article_id desc')->limit($size)->select();
        //p($article);
        $this->assign('article',$article);

        //最新留言
        $message=M('Message')->order('message_id desc')->limit(8)->select();
        $this->assign('message',$message);
        //p($message);
        $this->display('index_v1');
    }

}
