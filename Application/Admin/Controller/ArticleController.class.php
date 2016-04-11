<?php 
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController{
    /*
     *文章列表
     */
    public function index($page_id=1){
        $list=D('Article')->where('status != 2')->select();
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('article_list');    
    }

    /*
     *发表文章
     */
    public function add(){
        //出处
        $sre_list=M('source')->field('sre_id,sre_name')->where(array('status'=>0))->order('sort_order')->select();
        //文章类别
        $cat_list=D('category')->get_cat_data();
        $this->assign('sre_list',$sre_list);
        $this->assign('cat_list',$cat_list);
        $this->display('article_add');
    }
}
