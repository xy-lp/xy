<?php 
namespace Admin\Model;
use Think\Model;
class AuthorityModel extends Model{
    /*
     *定义属性
     */
    private $config=array(
        'table_name'    => 'Authority',     //表名
        'tree_pid'      => 'pid',           //父级的字段名
        'tree_id'       => 'authority_id',     //权限id的字段名 
    );

    /*
     *字段映射
     */
    protected $_map=array(
        'name'      =>  'authority_name',
        'sort'      =>  'sort_order',
        'display'   =>  'status',
    );

    /*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和数据库中的字段名一致
     */
    protected $insertFields=array('authority_name','pid','url','sort_order','status');
    protected $updateFields=array('authority_name','pid','url','sort_order','status');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('authority_name','require','分类名称不能为空!'),
        array('authority_name','0,50','分类名称应为50字以内!',0,'length',3),
       // array('cat_name','','分类名称已存在!',0,'unique','self::MODEL_INSERT'),
        array('sort_order','number','排序值应为数字!'),
        array('status','array(0,1)',0,'请选择状态',3,'in'),
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
     *获取权限列表
     */
    public function get_rule_data(){
        $param=array();
        return $this->Tree($param);
    }

    /*
     *获取记录的子级
     *@param $auth_id int 记录id
     */
    public function get_child($auth_id){
        //定义参数
        $param=array(
            'id'        =>  $auth_id,
            'where'     =>  array('status'=>0),
            'field'     =>  'authority_id,authority_name,pid',
        );
        return $this->Tree($param);
    }

    /*
     *取出修改的记录
     *@param $cat_id int 要修改的记录id
     */
    public function get_edit_data($auth_id){
        $auth_id=(int)$auth_id;
        //获取树结构的类别所有数据
        $auth_data=$this->get_rule_data();
        $auth_list=array();
        //只取父类＝0的顶级类别 （ps:根据项目的需求,只需要二级类别）
        foreach($auth_data as $k=>$v){
            if($v['deep']==0){
                $auth_list[$k]=$v;
            }  
        }
        $data=array(
            'info'      =>  $this->find($auth_id),       //记录的数据
            'auth_list'  =>  $auth_list,                  //类别父级列表
        );
        return $data;
    } 

    /*
     *修改操作
     *@param $cat_id int 记录id
     *@param $data array 表单提交的数据
     */
    public function edit_auth($id,$data){
        $id=(int)$id;
        $id_array=$this->get_child($id);    //通过id获取子级数组
        $ids=array();
        $error='';
        //将子级id数组中的id取出放到一个空数组中
        if(!empty($id_array)){
            foreach($id_array as $v){
                $ids[]=$v['authority_id'];   
            }   
        }  
        //将要修改记录的id也放入数组中
        $ids[]=$id;
        //判断表单数据的父级是否存在子级的数组中
        if(in_array($data['pid'],$ids)){
            $error='不能把自己和自己的子级当作父级';
        }
        return $error;
    }
}
