<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/28
 * Time: 11:01
 */
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{
    /*
     * 字段映射
     */
    protected $_map=array(
        'name'       => 'role_name',
        'display'   => 'status',
    );

    /*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和和数据库的字段名相同
     */
    protected $insertFields=array('role_name','status','rules');
    protected $updateFields=array('role_name','status','rules');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('role_name','require','角色名不能为空'),
        array('role_name','0,50','角色名应在50字以内',0,'length',3),
        //array('role_name','','分类名称已存在',1,'unique','self::MODEL_INSERT'),
        array('status','array(0,1)',0,'请选择状态',3,'in'),
    );

    /*
      *删除之前的操作
      *再删除角色操作之前先要删除对应的权限
      */
    protected function _before_delete(&$data,$options){
        //获取删除的数据id
        $role_id=$data['where']['article_id'];
        M('role_authority')->where(array('role_id'=>$role_id))->delete();
    }
}