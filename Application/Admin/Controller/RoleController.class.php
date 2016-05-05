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
    public function index($page_id=1)
    {
        $list=M('Role')->select();
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('role_list');
    }

    public function add()
    {

        if(IS_POST){
            $model=D('Role');
            if(!$data=$model->create()){
                $this->error($model->getError());
            }
            $i=$model->where(array('role_id'=>$data['role_id']))->select();
            if(!empty($i)){
                $this->error('用户名已存在');
            }
            if($model->add($data))
                $this->success('添加成功',U('index'),1);
            else
                $this->error($model->getError());
            exit;
        }
        $this->display('role_add');
    }

    public function del($id){

        $role_id=(int)$id;
        if(D('Role')->delete($role_id)){
            $this->success('删除成功',U('index'),1);
        }else{
            $this->error('删除失败',U('index'),1);
        }
    }

    public function edit($id){
        //echo 2222;exit;
        $model=D('Role');
        if(IS_POST){
            if($data=$model->create()){
                $data['role_id']=I('post.id');
                //p($data);
                if($model->save($data)){
                    $this->success('修改成功',U('index'),1);
                    exit;
                }else{
                    $this->error($model->getError());
                }
            }else{
                $this->error($model->getError());
            }
        }
        $role_id=(int)$id;
        $info=$model->where(array('role_id'=>$role_id))->find();
        $this->assign('info',$info);
        $this->display('role_edit');
    }

    /*
     * 分配权限
     */
    public function assign_rule($id){
        $auth_model=M('authority');
        $role_id=(int)$id;
        if(IS_POST){
            $model=D('role');
            if($ru_ids=$auth_model->create()){
                $data['rules']=implode(',',$ru_ids['authority_id']);
                $data['role_id']=I('post.role_id');
                //p($data);
                if($model->save($data))
                    $this->success('保存成功',U('index'),1);
                else
                    $this->error($model->getError());
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        $list=$auth_model->where(array('pid'=>'0','status'=>'0'))->select();
        $map['pid']=array('NEQ','0');
        $map['status']=array('EQ','0');
        $info=$auth_model->where($map)->select();
        //$role_list=$auth_model->where(array('pid'=>0))->select();
        //$role_info=$auth_model->where('pid' != 0)->select();
        $this->assign('list',$list);
        $this->assign('info',$info);
        $this->assign('role_id',$role_id);
        $this->display('assign_rule');

    }

}