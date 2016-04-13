<?php 
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
    /*
     * 字段映射
     */
    protected $_map=array(
        'sre'       => 'sre_id',
        //'title'   => 'title',
        //'author'  => 'author',
        'pid'       => 'cat_id',
        //'excerpt' => 'excerpt',
        'time'      => 'add_time',
        //'content' => 'content',
        'display'   => 'is_show',
        'discuss'   => 'is_discuss',
        'top'       => 'is_top'
    );

    /*
     *验证表单合法性
     *@attr $insertFields array 定义添加的字段名
     *@attr $updateFields array 定义修改的字段名
     *注意：字段名和和数据库的字段名相同
     */
    protected $insertFields=array('title','content','excerpt','author','add_time','sre_id','cat_id','img_path','stat    us','is_show','is_discuss','is_top');
    protected $updateFields=array('title','content','excerpt','author','sre_id','cat_id','img_path','hits','midify_t    ime','status','is_show','is_discuss','is_top');

    /*
     *自动验证
     */
    protected $_validate=array(
        array('title','require','文章标题不能为空'),
        array('title','0,50','文章标题应在50字以内',0,'length',3),
        //array('title','','分类名称已存在',1,'unique','self::MODEL_INSERT'),

        array('content','require','文章内容不能为空'),
        array('excerpt','require','文章摘要不能为空'),
        array('excerpt','0,200','文章摘要应在200字以内',0,'length',3),
        
        array('author','require','作者名不能为空'),
        array('author','0,50','作者名太长',0,'length',3),
        array('sre_id','number','文章出处错误！'),
        array('cat_id','number','文章类别错误'),
        array('is_show','array(0,1)',0,'请选择是否显示',3,'in'),
        array('is_discuss','array(0,1)',0,'请选择是否允许评论',3,'in'),
        array('is_top','array(0,1)',0,'请选择是否置顶',3,'in'),     
    );

    /*
     *图片上传的操作
     */
    private function img_upload(){
        //定义上传文件的参数
        $config=array(
            'mimes'         => array('image/jpg','image/png','image/jpeg','image/gif'),  //允许上传的文件类型
            'rootPath'      => C('UPLOAD_PATH'),  //上传文件的根节点
            'maxSize'       => 0,  //上传的文件大小限制 (0-不做限制)
            'savePath'      => 'Article/',  //保存路径
            'is_array'      => 0,   //声明单文件上传
        );
        //执行上传文件和生成缩略图
        $res = uploadImage('img_path',$config);
       // p($res);
        //判断上述操作是否执行成功
        if($res['ok']==1){
            //将源图和缩略图的地址存放$data数组中写入数据库
            $data['img_path']=$res['img'][0];
        }else{
            //返回上传文件和生成缩略图中产生的错误
            $this->error=$res['error'];
            return false;
        }
    }

    /*
     *添加之前的操作
     *在发表文章之前先上传图片
     */
    protected function _before_insert(&$data,$options){
        //$this->img_upload();
        //定义上传文件的参数
        $config=array(
            'mimes'         => array('image/jpg','image/png','image/jpeg','image/gif'),  //允许上传的文件类型
            'rootPath'      => C('UPLOAD_PATH'),  //上传文件的根节点
            'maxSize'       => 0,  //上传的文件大小限制 (0-不做限制)
            'savePath'      => 'Article/',  //保存路径
            'is_array'      => 0,   //声明单文件上传
        );
        //执行上传文件和生成缩略图
        $res = uploadImage('img_path',$config);
       // p($res);
        //判断上述操作是否执行成功
        if($res['ok']==1){
            //将源图和缩略图的地址存放$data数组中写入数据库
            $data['img_path']=$res['img'][0];
        }else{
            //返回上传文件和生成缩略图中产生的错误
            $this->error=$res['error'];
            return false;
        }
    }

    /*
     *删除之前的操作
     *再删除文章操作之前先要删除对应的图片
     */
    protected function _before_delete(&$data,$options){
        //获取删除的数据id
        $article_id=$data['where']['article_id'];
        $img_path=$this->field('img_path')->where(array('article_id'=>$article_id))->find();
        //如果改数据有图片，则删除
        if($img_path['img_path']){
            $path=C('UPLOAD_PATH').$img_path['img_path'];
            @unlink($path);
        }
    }

    /*
     *修改之前的操作
     *在修改操作之前先判断是否有图片上传
     *有图片上传则删掉之前的图片，保存新的图片；
     *没有图片上传则保留原来的图片
     */
    protected function _before_update(&$data,$options){
        //判断是否有图片上传
        if(!empty($_FILES['img_path']['name'])){
            //获取修改的数据id
            $article_id=$options['where']['article_id'];
            //获取该数据的图片路径，并判断是否存在，存在则删除
            $img_path=$this->field('img_path')->where(array('article_id'=>$article_id))->find();
            if($img_path['img_path']){
                $path=C('UPLOAD_PATH').$img_path['img_path'];	//拼接图片所在的位置
                @unlink($path);		//unlink:删除文件的函数  @防止报错
            }

            //图片上传的操作
            // $this->img_upload();
            //定义上传文件的参数
            $config=array(
                'mimes'         => array('image/jpg','image/png','image/jpeg','image/gif'),  //允许上传的文件类型
                'rootPath'      => C('UPLOAD_PATH'),  //上传文件的根节点
                'maxSize'       => 0,  //上传的文件大小限制 (0-不做限制)
                'savePath'      => 'Article/',  //保存路径
                'is_array'      => 0,   //声明单文件上传
            );
            //执行上传文件和生成缩略图
            $res = uploadImage('img_path',$config);
            //判断上述操作是否执行成功
            if($res['ok']==1){
                //将源图和缩略图的地址存放$data数组中写入数据库
                $data['img_path']=$res['img'][0];
            }else{
                //返回上传文件和生成缩略图中产生的错误
                $this->error=$res['error'];
                return false;
            }
        }
    }
}
