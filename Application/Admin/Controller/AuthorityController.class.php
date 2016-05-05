<?php 
namespace Admin\Controller;
use Think\Controller;
class AuthorityController extends BaseController{
    /*
     *权限列表
     */
    public function index($page_id=1){
        $list=D('Authority')->get_rule_data();
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            foreach($data['list'] as $k=>$v){
                $data['list'][$k]['sname']=str_repeat('--',$v['deep']*4).$v['authority_name'];
                $data['list'][$k]['status_img']=empty($v['status'])?'yes':'no';
            }
            echo json_encode($data);
            exit;
        }
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('authority_list');
    }

    /*
     *添加权限
     */
    public function add(){
        $model=D('Authority');
        if(IS_POST){
            if(!$data=$model->create())
                $this->error($model->getError());
            $i=$model->where(array('authority_name'=>$data['authority_name']))->find();
            if($i){
                $this->error('权限名称已存在');
            }
            if($model->add($data))
                $this->success('添加成功',U('index'),1);
            else
                $this->error('添加失败');
            exit;
        }
        $auth_data=$model->get_rule_data();
        $auth_list=array();
        foreach($auth_data as $k=>$v){
            if($v['deep']==0){
                $auth_list[$k]=$v;
            }
        }
        $this->assign('auth_list',$auth_list);
        $this->display('authority_add');
    }

    /*
     *删除权限
     */
    public function del($id){
        $auth_id=(int)$id;
        $model=D('Authority');
        $childs=$model->get_child($auth_id);
        if(!empty($childs))
            $this->error('请先删除子级');
        if($model->delete($auth_id))
            $this->success('删除成功',U('index'),1);
        else
            $this->error('删除失败');
        exit;
    }

    /*
     *修改权限
     */
    public function edit(){
        $model=D('Authority');
        if(IS_POST){
            $auth_id=I('post.id');
            if(!$data=$model->create()){
                $this->error($model->getError());
            }
            $error=$model->edit_auth($auth_id,$data);
            if(!empty($error)){
                $this->error($error); 
            }
            $data['authority_id']=$auth_id;
            if($model->save($data))
                $this->success('修改成功',U('index'),1);      
            else
                $this->error('修改失败');
            exit;
        }
        $auth_id=I('get.id');
        $data=$model->get_edit_data($auth_id);
        $this->assign('info',$data['info']);
        $this->assign('auth_list',$data['auth_list']);
        $this->display('authority_edit');
    }
}
