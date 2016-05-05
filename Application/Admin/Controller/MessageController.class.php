<?PHP
namespace Admin\Controller;
use Think\Controller;
class MessageController extends BaseController{
    /*
     *留言列表
     */
    public function index($page_id=1){
        $list=M('message')->order('message_time desc')->select();
        if(IS_POST){
            $page_id=I('post.id');
            $data=data_page($list,$page_id);
            foreach($data['list'] as $k=>$v){
                $data['list'][$k]['message_time']=date('Y-m-d H:i:s',$v['message_time']);
                $data['list'][$k]['visitor_ip']=long2ip($v['visitor_ip']);
            }
            echo json_encode($data);
            exit;
        }
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('message_list');
    }

    /*
     *查看留言
     */
    public function details($id){
        $info=M('message')->find($id);
        $this->assign('info',$info);
        $this->display('message_details'); 
    }

    /*
     *删除留言
     */
    public function del($id){
        $message_id=(int)$id; 
        if(M('message')->delete($message_id))
            $this->success('删除成功',U('index'),1);
        else 
            $this->error('删除失败',U('index'),1);
        exit;
    }
}
