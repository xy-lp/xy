<?php 
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController{
    /*
     *类别列表
     */
    public function index($page_id=1){
        $list=D('Category')->get_catdata();
        $data=data_page($list,$page_id);
        //p($data);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('cat_list');
    }

    /*
     *添加类别
     */
    public function add(){
        $this->display('cat_add');
    }
}
