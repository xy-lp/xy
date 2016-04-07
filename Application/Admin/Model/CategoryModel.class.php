<?php 
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    /*
     *字段映射
     */
    protected $_map=array(
        'name'  =>  'cat_name',
        'pid'   =>  'cat_pid',
        'desc'  =>  'cat_desc',
        'sort'=>  'sort_order',
        'display'   =>  'is_show',
    );

    /*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和数据库中的字段名一致
     */
    protected $insertFields=array('cat_name','cat_pid','cat_desc','sort_order','is_show');
    protected $updateFields=array('cat_name','cat_pid','cat_desc','sort_order','is_show');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('cat_name','require','分类名称不能为空!'),
        array('cat_name','0,50','分类名称应为50字以内!',0,'length',3),
        array('cat_name','','分类名称已存在!',1,'unique','self::MODEL_INSERT'),
        array('sort_order','number','排序值应为数字!'),
        array('is_show','array(0,1)',0,'请选择是否显示',3,'in'),
    );

    /*
     *获取分类列表
     */
    public function get_catdata(){
        //定义参数
        $config=array(
            'table_name' =>  'Category',    //表名
            'tree_pid'   =>  'cat_pid',     //父级的字段名
            'tree_id'    =>  'cat_id',      //id的字段名
            'status'     =>  'is_show',     //状态的字段名
        );
        $web=new \Library\Web();
        return $web->getTree($config);
    }
}
