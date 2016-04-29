<?php 
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function __construct(){
        parent::__construct();
        $this->checkLogin();
        //$this->checkAuth();
    }
    private function checkLogin(){
        $uid=session('uid');
        if(empty($uid)){
            echo <<<jump
			<script type="text/javascript">
			alert('您还没登录，请先登录');
		    window.top.location.href='/index.php/admin/login/login';
		    </script>
jump;
            exit;
        }
    }

    private function checkAuth(){
        $allow_controller_array=array('admin');
        if(!in_array(strtolower(CONTROLLER_NAME),$allow_controller_array)){
            $rules=session('rules');
            $ru_array=explode(',',$rules);
            //p($ru_array);
            $now_ru=strtolower('Admin/'.CONTROLLER_NAME.'/'.ACTION_NAME);
            $i=M('authority')->field('authority_id')->where(array('url'=>$now_ru))->find();
            //p($i);
            if($i){
                if(in_array($i['authority_id'],$ru_array)){
                    return true;
                }
            }
            die('你没有该权限');
        }
    }
}
