<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/14
 * Time: 15:50
 */
namespace Admin\Controller;
use Think\Controller;
class RoleController extends BaseController{
    public function index()
    {
        $roledata=M('Role')->select();
        $this->display('role_list');
    }

    public function add()
    {
        $this->display('role_add');
    }
}