<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/28
 * Time: 13:01
 */
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
    /*
     * 字段映射
     */
    protected $_map=array(
        'name'       => 'user_name',
        'pwd'       => 'password',
        'pid'       => 'user_role',
        'display'   => 'status',
    );

    /*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和和数据库的字段名相同
     */
    protected $insertFields=array('user_name','password','status','reg_time','user_role','salt');
    protected $updateFields=array('role_name','status','user_role','password');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('user_name','require','用户名不能为空'),
        array('user_name','0,50','用户名应在50字以内',0,'length',3),
        //array('role_name','','分类名称已存在',1,'unique','self::MODEL_INSERT'),
        //array('password','require','密码不能为空',0,'',1),
        array('status','array(0,1)',0,'请选择状态',3,'in'),
    );

}