<?php 
namespace Admin\Controller;
use Think\Controller;
class AdminController extends BaseController{
    public function admin(){
        $this->display('index');
    }
}
