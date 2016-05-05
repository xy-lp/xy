<?php 
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController{
    /*
     *文章列表
     */
    public function index($page_id=1){
        $list=D('Article')->where('status != 2')->select();
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            foreach($data['list'] as $k=>$v){
                $data['list'][$k]['status_img']=empty($v['status'])?'yes':'no';
                $data['list'][$k]['show_img']=empty($v['is_show'])?'yes':'no';
                $data['list'][$k]['discuss_img']=empty($v['is_discuss'])?'yes':'no';
                $data['list'][$k]['top_img']=empty($v['is_top'])?'yes':'no';
            }
            echo json_encode($data);
            exit;
        }
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('article_list');    
    }

    /*
     *发表文章
     */
    public function add(){
        if(IS_POST){
            $model=D('Article');
            if($data=$model->create()){
                $data['add_time']=time();
                if(empty($data['cat_id'])){
                    $this->error('请选择类别','',1);
                }
                //p($data);
                if($model->add($data)){
                    $this->success('添加成功',U('index'));
                    exit;
                }
            }
            $error=$model->getError();
            if(empty($error)){
                $error='添加失败';
            }
            $this->error($error,'',1);
        }
        //获取文章出处
        $sre_list=M('source')->field('sre_id,sre_name')->where(array('status'=>0))->order('sort_order')->select();
        //获取文章类别
        $cat_list=D('Category')->get_cat_data();
        $this->assign('sre_list',$sre_list);
        $this->assign('cat_list',$cat_list);
        $this->display('article_add');
    }

    /*
	 *删除文章
 	 */
    public function del($id){
        $article_id=(int)$id;
        $model=D('Article');
        $data['article_id']=$article_id;
        $data['status']=2;
        if($model->save($data))
            $this->success('删除成功',U('index'),1);
        else
            $this->error('删除失败',U('index'),1);
        exit;
    }

    /*
     *修改文章
     */
    public function edit(){
        $model=D('Article');
        if(IS_POST){
            //获取表单提交的数据
            if($data=$model->create()){
                $data['article_id']=I('post.id');     //获取修改数据的原id
                $data['midify_time']=time();     //'博客修改时间'字段
                if($model->save($data)){
                    $this->success('修改成功',U('index'),1);
                    exit;
                }else{
                    $this->error('修改失败','',1);
                }
            }else{
                $this->error($model->getError());
            }
        }
        $id=I("get.id");
        //取出要修改的字段信息
        $info=$model->find($id);
        $this->assign('info',$info);
        //获取文章出处
        $sre_list=M('source')->field('sre_id,sre_name')->where(array('status'=>0))->order('sort_order')->select();
        //获取文章类别
        $cat_list=D('Category')->get_cat_data();
        $this->assign('sre_list',$sre_list);
        $this->assign('cat_list',$cat_list);
        //p($info);
        $this->display('article_edit');
    }

    /*
     *文章回收站
     */
    public function recycle($page_id=1){
        $list=D('article')->where(array('status'=>2))->select();
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            foreach($data['list'] as $k=>$v){
                $data['list'][$k]['status_img']=empty($v['status'])?'yes':'no';
                $data['list'][$k]['show_img']=empty($v['is_show'])?'yes':'no';
                $data['list'][$k]['discuss_img']=empty($v['is_discuss'])?'yes':'no';
                $data['list'][$k]['top_img']=empty($v['is_top'])?'yes':'no';
            }
            echo json_encode($data);
            exit;
        }
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('recycle_list');
    }

    /*
     *回收站还原
     */
    public function reduction($id){
        $article_id=(int)$id;
        $model=D('Article');
        $data=array(
            'article_id'=>$article_id,
            'status' =>1,
        );
        if($model->save($data))
            $this->success('还原成功',U('recycle'),1);
        else
            $this->error('还原失败',U('recycle'),1);
        exit; 
    }

    /*
     *回收站删除
     */
    public function recycle_del($id){
        $article_id=(int)$id;
        $model=D('Article');
        if($model->delete($article_id))
            $this->success('删除成功',U('recycle'),1);
        else
            $this->error('删除失败',U('recycle'),1);
    }

    /*
     * 查看文章
     */
    public function look($id){
        $article_id=(int)$id;
        $article_list=M('article')->where(array('article_id'=>$article_id))->find();
        $this->assign('list',$article_list);
        $this->display('look');
    }
}
