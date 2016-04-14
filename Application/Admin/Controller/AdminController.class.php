<?php 
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController{
    public function admin(){
        $article=M('Article')->select();
        //p($article);
        $this->assign('article',$article);
        $this->display('index');
    }

    public function index1()
    {
        $article=M('Article')->select();
        //p($article);
        $this->assign('article',$article);
        $this->display('index_v1');
    }
}
