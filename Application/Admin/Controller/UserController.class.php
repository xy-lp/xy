<?PHP 
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController{
    /*
     *用户列表
     */
    public function index($page_id=1){
        $list=M('User')->select();
        $data=data_page($list,$page_id);
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('user_list');
    }

    /*
     *添加用户
     */
    public function add(){
        $this->display('user_add');
    }

    /*
     *删除用户
     */
    public function del($id){
    
    }

    /*
     *用户修改
     */
    public function edit(){
        $this->display('user_edit'); 
    }
}
