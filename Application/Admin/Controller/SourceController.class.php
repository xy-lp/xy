<?PHP 
namespace Admin\Controller;
use Think\Controller;
class SourceController extends BaseController{
    /*
     *出处列表
     *@param $page_id int 页码
     *@return array 列表，分页数组
     */
    public function index($page_id=1){
        $list=M('Source')->select(); 
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            echo json_encode($data);
            exit; 
        }
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('source_list');
    }

    /*
     *添加出处
     */
    public function add(){
        if(IS_POST){
            $model=D('Source');
            if(!$data=$model->create()){
                $this->error($model->getError()); 
            }
            $i=$model->where(array('sre_name'=>$data['sre_name']))->find();
            if($i){
                $this->error('出处名称已存在');
            }
            if($model->add($data))
                $this->success('添加成功',U('index'),1);
            else
                $this->error('添加失败');
            exit;
        }
        $this->display('source_add'); 
    }

    /*
     *删除出处
     */
    public function del($id){
        $sre_id=(int)$id;
        if(empty($sre_id)){
            $this->error('数据错误，请刷新后再试'); 
        }
        if(M('Source')->delete($sre_id))
            $this->success('添加成功',U('index'),1);
        else 
            $this->error('添加失败',U('index'),1);
        exit;
    }

    /*
     *修改出处
     */
    public function edit(){
        $model=D('source');
        if(IS_POST){
            if(!$data=$model->create())
                $this->error($model->getError());
            $data['sre_id']=I('post.id');
            if($model->save($data))
                $this->success('修改成功',U('index'),1);
            else 
                $this->error('修改失败');
            exit;
        } 
        $sre_id=I('get.id');
        if(empty($sre_id)){
             $this->error('数据错误，请刷新后再试');
        }
        $info=$model->find($sre_id);
        $this->assign('info',$info);
        $this->display('source_edit');
    }
}
