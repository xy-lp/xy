<?php 
namespace Admin\Model;
use Think\Model;
class LabelModel extends Model{
    /*
     *字段映射
     */
    protected $_map=array(
        'name'  =>  'label_name',
        'pid'   =>  'cat_id',
        'sort'  =>  'sort_order',
    );

    /*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和数据库中的字段名一致
     */
    protected $insertFields=array('label_name','cat_id','sort_order');
    protected $updateFields=array('label_name','cat_id','sort_order');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('label_name','require','标签名称不能为空!'),
        array('label_name','0,50','标签名称应为50字以内!',0,'length',3),
        //array('label_name','','分类名称已存在!',0,'unique','self::MODEL_INSERT'),
        array('sort_order','number','排序值应为数字!'),
    );
}
