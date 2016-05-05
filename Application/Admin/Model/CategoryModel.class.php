<?php 
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    /*
     *定义属性
     */
    private $config=array(
            'table_name' =>  'Category',    //表名
            'tree_pid'   =>  'cat_pid',     //父级的字段名
            'tree_id'    =>  'cat_id',      //id的字段名
    );

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
    protected $insertFields=array('cat_name','cat_pid','cat_desc','sort_order','is_show','url');
    protected $updateFields=array('cat_name','cat_pid','cat_desc','sort_order','is_show','url');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('cat_name','require','分类名称不能为空!'),
        array('cat_name','0,50','分类名称应为50字以内!',0,'length',3),
        array('cat_name','','分类名称已存在!',0,'unique','self::MODEL_INSERT'),
        array('sort_order','number','排序值应为数字!'),
        array('is_show','array(0,1)',0,'请选择是否显示',3,'in'),
        array('url','require','分类名称不能为空!'),
    );

    /*
     *获取树结构数据
     *@param $param array 获取树结构的自定义参数
     if has $param['id'] 获取的是子级   else 获取的是所有数据
     */
    private function Tree($param=array()){
       $config=$this->config;       //获取公共的必要参数
       $new_config=array_merge($config,$param);    //合并参数数组
       //调用类库的方法获取树结构数据
       $web=new \Library\Web();
       return $web->getTree($new_config); 
    }

    /*
     *获取分类列表
     */
    public function get_cat_data(){
        $param=array();
        return $this->Tree($param);  
    }

    /*
     *获取记录的子级
     *@param $cat_id int 记录id
     */
    public function get_child($cat_id){
        //定义参数
        $param=array(
            'id'    => $cat_id,
            'where' => array('is_show'=>0),
            'field' => 'cat_id,cat_name,cat_pid',
        );
        return $this->Tree($param);
    }

    /*
     *取出修改的记录
     *@param $cat_id int 要修改的记录id
     */
    public function get_edit_data($cat_id){
        $cat_id=(int)$cat_id;
        //获取树结构的类别所有数据
        $cat_data=$this->get_cat_data();
        $cat_list=array();
        //只取父类＝0的顶级类别 （ps:根据项目的需求,只需要二级类别）
        foreach($cat_data as $k=>$v){
            if($v['deep']==0){
                $cat_list[$k]=$v;
            } 
        }
        $data=array(
            /*'ids'       =>  $this->get_child($cat_id),  //记录的子级的集合*/
            'info'      =>  $this->find($cat_id),       //记录的数据
            'cat_list'  =>  $cat_list,                  //类别父级列表
        );
        return $data;
    }

    /*
     *修改操作
     *@param $cat_id int 记录id
     *@param $data array 表单提交的数据
     */
    public function edit_auth($cat_id,$data){
        $cat_id=(int)$cat_id;
        $id_array=$this->get_child($cat_id);    //通过id获取子级数组
        $ids=array();
        $error='';
        //将子级id数组中的id取出放到一个空数组中
        if(!empty($id_array)){
            foreach($id_array as $v){
                $ids[]=$v['cat_id'];   
            }
        }
        //将要修改记录的id也放入数组中
        $ids[]=$cat_id;
        //判断表单数据的父级是否存在子级的数组中
        if(in_array($data['cat_pid'],$ids)){
            $error='不能把自己和自己的子级当作父级';
        }
        return $error;
    }
}
