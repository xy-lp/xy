<?PHP
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->param();
    }

    public function param(){
        //头部导航栏

        $top_list=$this->get_top_list();
        $this->assign('top_list',$top_list);
    }

    protected function get_top_list(){
        $top_list=M('category')->field('cat_id,cat_name,url')->order('sort_order')->where(array('is_show'=>0,'cat_pid'=>0))->limit(6)->select();
        return $top_list;
    }

    public function system_path(){
        $web=new \Library\Web();
    } 
}
