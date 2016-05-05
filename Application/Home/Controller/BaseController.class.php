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
        if(!empty($top_list)){
            foreach($top_list as $k => $v){
                if($v['url'] != '/index.php'){
                    $top_list[$k]['url']='/index.php'.$v['url'];
                }
            }
        }
        return $top_list;
    }

    public function system_path(){
        $web=new \Library\Web();
    }

    /**
     * 最新文章列表
     */
    public function get_new_list(){
        $new=M('article')->order('article_id desc')->limit('3')->field('title')->select();
        return $new;
    }

    /**
     * 最热文章列表
     */
    public function get_hot_list(){
        $hot=M('article')->order('hits desc')->limit(3)->field('title')->select();//p($hot);
        return $hot;
    }
}
