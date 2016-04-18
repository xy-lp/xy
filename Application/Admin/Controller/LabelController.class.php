<?PHP 
namespace Admin\Controller;
use Think\Controller;
class LabelController extends BaseController{
    /*
     *标签列表
     */
    public function index($id=''){
        $cat_id=(int)$id;
        $where=array('cat_id'=>$cat_id);
        if(empty($cat_id)){
            $where=1;
        }
        $list=M('label')->where($where)->select();
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            echo json_encode($data);
            exit;   
        }
        $page_id=1;
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('label_list'); 
    }

    /*
     *添加标签
     */
    public function add(){
        if(IS_POST){
            $model=D('label');
            if(!$data=$model->create()){
                $this->error($model->getError());
            }
            if($model->add($data))
                $this->success('添加成功',U('index'),1);
            else 
                $this->error('添加失败');
            exit;
        }
        $cat_list=D('Category')->get_cat_data();
        $this->assign('cat_list',$cat_list);
        $this->display('label_add');
    }

    /*
     *删除标签
     */
    public function del($id){
        $label_id=(int)$id;
        if(M('label')->delete($id))
            $this->success('删除成功',U('index'),1);
        else 
            $this->error('删除失败');
        exit; 
    }

    /*
     *修改标签
     */
    public function edit(){
        $model=D('label');
        if(IS_POST){
            if(!$data=$model->create()){
                $this->error($model->getError());
            }
            $data['label_id']=I('post.id');
            if($model->save($data))
                $this->success('修改成功',U('index'),1);
            else 
                $this->error('修改失败');
            exit;
        }
        $label_id=I('get.id');
        $info=$model->find($label_id);
        $cat_list=D('Category')->get_cat_data();
        $this->assign('cat_list',$cat_list);
        $this->assign('info',$info);
        $this->display('label_edit');
    }
}
