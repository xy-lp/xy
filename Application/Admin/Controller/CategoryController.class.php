<?php 
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends BaseController{
    /*
     *类别列表
     */
    public function index($page_id=1){
        $list=D('Category')->get_cat_data();
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            foreach($data['list'] as $k=>$v){
                $data['list'][$k]['sname']=str_repeat('--',$v['deep']*4).$v['cat_name'];
                $data['list'][$k]['status_img']=empty($v['is_show'])?'yes':'no';
            }
            echo json_encode($data);
            exit;
        }
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
        $model=D('Category');
        if(IS_POST){
            if(!$data=$model->create())
                $this->error($model->getError());
            if($model->add($data))
                $this->success('添加成功',U('index'),1);
            else
                $this->error('添加失败');
            exit;
        }
        $cat_data=$model->get_cat_data();
        $cat_list=array();
        foreach($cat_data as $k=>$v){
            if($v['deep']==0){
                $cat_list[$k]=$v;
            }
        }
        $this->assign('cat_list',$cat_list);
        $this->display('cat_add');
    }

    /*
     *删除类别
     */
    public function del($id){
        $cat_id=(int)$id;
        $this->success('删除成功',U('index'),1);
    }
}
