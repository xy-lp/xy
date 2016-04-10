<?PHP 
namespace Library;
class Web{
    //生成树结构的属性
    private $tree_pid='';                //pid的字段名
    private $tree_id='';                 //id的字段名
    private $status_field='status';      //默认状态的字段名
    private $default_field='*';          //默认查询所有字段

    /*
     *生成树结构
     *@param $list 2array 要生成树结构的二维数组
     *@param $parent_id int  生成的树结构的起始pid值
     *@param $deep int 起始深度值
     *@return $tree 2array  生成好的树结构数组
     */
    private function _createTree($list,$parent_id,$deep=0){
        static $tree=array();   //静态变量，防止递归的时候被覆盖
        foreach($list as $rows){
            if($parent_id == $rows[$this->tree_pid]){
                $rows['deep'] = $deep;
                $tree[] = $rows;
                $this->_createTree($list,$rows[$this->tree_id],$deep+1);
            }
        }
        return $tree;
    }

    /*
     *验证生成树的必要参数
     */
    private function _treeAuth($config){
        //判断必要的参数是否存在
        if(!$config){
            $error['msg']='参数为空';
        }elseif(!$config['table_name']){
            $error['msg']='缺少数据表名(缺少键名：table_name)';
        }elseif(!$config['tree_pid']){
            $error['msg']='缺少父级编号的字段名(缺少键名:tree_pid)';
        }elseif(!$config['tree_id']){
            $error['msg']='缺少id字段名(缺少键名:tree_id)';
        }
        return $error;
     }

    /*
     *获取树形结构
     *注意：如果参数存在$config['id']，则获取的是自己的子级(其中键'id'是记录的id)
     *@param $config array 生成树结构的参数
     *************************************
     必要参数：
     $config=array(         
         'table_name'         =>  'category',     数据表名，如：category
         'tree_pid'   =>  'cat_pid',      父级字段名，如：cat_pid
         'tree_id'    =>  'cat_id',       id的字段名，如：cat_id
       )
     非必要参数：
     $config=array(
         'where'    => array()   查询的条件
         'field'    => ''        要查询的字段名，如不存在查询所有
     )
     *************************************
     *@return $error Or array() Or $tree 生成好的树结构二维数组 
     */
    public function getTree($config){
        //验证必要参数
        $error=$this->_treeAuth($config);
        //如果没错误则执行生成树形结构，不然就返回错误
        if(empty($error)){
            //获取查询条件
            $where=empty($config['where'])? '1' : $config['where'];
            //判断要查询的字段名（没有默认查找所有字段）
            $field=empty($config['field'])? $this->default_field : $config['field'];
            //查询数据
            $list=M($config['table_name'])->field($field)->where($where)->select();
            if(!empty($list)){
                //将参数附值给属性，方便其他方法的使用
                $this->tree_pid  =  $config['tree_pid'];
                $this->tree_id   =  $config['tree_id'];
                //调用生成树结构的方法
                if(empty($config['id'])){
                    return $this->_createTree($list,'0');
                }else{
                    return $this->_getChild($list,$config['id']);
                }
            }
            return array();     //如果没查到数据，则返回空数组
        }
        return $error;  //如果缺少必要参数，返回相应的错误
   }    

    
    /*
     *生成子分类的数组
     *@param $list array 数据的总和
     *@param $id int 记录的id
     *@return array 子级的集合 
     */
    private function _getChild($list,$id){
        static $ids=array();    //静态变量，防止递归时变量被覆盖
        //循环数组，取出父类等于id
        foreach($list as $v){
            if($v[$this->tree_pid] == $id){
                $ids[]=$v;
                $this->_getChild($list,$v[$this->tree_id]);
            }
        }
        return $ids;
    }
}
