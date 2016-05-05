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
        foreach($data['list'] as $k => $v ){
            $role=M('role')->find($v['user_role']);
            $data['list'][$k]['role_name']=$role['role_name'];
        }
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        $this->display('user_list');
    }

    /*
     *添加用户
     */
    public function add(){
        $model=D('user');
        if(IS_POST){
            if($data=$model->create()){
                //获取提交的数据
                if(empty($data['password'])){
                    $this->error('密码不能为空','',1);
                }
                $ppwd=I('post.ppwd');
                if($ppwd != $data['password']){
                    $this->error('密码不一致','',1);
                }
                $i=$model->where(array('user_name'=>$data['user_name']))->select();
                if(!empty($i)){
                    $this->error('用户名已存在','',1);
                }

                if(empty($data['user_role'])){
                    $this->error('请选择所属角色','',1);
                }
                $pwd=md5($data['password']);   //将密码加密
                //生成密码密钥
                $data['salt']=md5(uniqid(rand(), TRUE));
                //生成密码
                $data['password']= md5($pwd.$data['salt']);
                $data['reg_time']=time();
                if($model->add($data))
                    $this->success('添加成功',U('index'),1);
                else
                    $this->error('添加失败','',1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        //显示添加页面
        $role_list=M('role')->field('role_id,role_name')->where(array('status'=>'0'))->select();     //获取角色
        $this->assign('role_list',$role_list);
        //p($role_list);
        $this->display('user_add');
    }

    /*
     *删除用户
     */
    public function del($id){
        $user_id=(int)$id;
        if(D('user')->delete($user_id)){
            $this->success('删除成功',U('index'),1);
        }else{
            $this->error('删除失败','',1);
        }
    }

    /*
     *用户修改
     */
    public function edit($id){
        $model=D('user');
        if(IS_POST){
            if($data=$model->create()){
                //获取提交的数据
                $data['user_id']=I('post.id');
                if(!empty($data['password'])){
                    $ppwd=I('post.ppwd');
                    if($ppwd != $data['password']){
                        $this->error('密码不一致','',1);
                    }
                    $i=$model->where(array('user_name'=>$data['user_name']))->find();
                    $info=$model->where(array('user_id'=>$data['user_id']))->find();
                    if($i && $data['user_name'] != $info['user_name']){
                        $this->error('用户名已存在','',1);
                    }
                    $pwd=md5($data['password']);   //将密码加密
                    //密码密钥
                    $salt=$info['salt'];
                    //生成密码
                    $data['password']= md5($pwd.$salt);
                }else{
                    unset($data['password']);
                }
                if(empty($data['user_role'])){
                    $this->error('请选择所属角色','',1);
                }
                if($model->save($data))
                    $this->success('修改成功',U('index'),1);
                else
                    $this->error('修改失败','',1);
                exit;
            }else{
                $this->error($model->getError());
            }
        }
        //显示修改页面
        $user_id=(int)$id;
        $info=$model->field('user_id,user_name,user_role,status')->find($user_id);
        $role_list=M('role')->field('role_id,role_name')->where(array('status'=>'0'))->select();     //获取角色
        $this->assign('info',$info);
        $this->assign('role_list',$role_list);
        //p($role_list);
        $this->display('user_edit'); 
    }

    /*
     *修改密码
     */
    public function modify_pwd(){
        if(IS_POST){
            $model=D('user');
            $uid=session('uid');
            $i=$model->field("user_id,password,salt")->find($uid);
            if(!empty($i)){
                $old_pwd=md5(md5(I('post.password')).$i['salt']);
                    if($i['password'] != $old_pwd){
                    $this->error('原密码错误','',1);
                }
                $new_pwd=I('post.pwd');
                if($new_pwd != I('post.ppwd')){
                    $this->error('新密码不一致','',1);
                }
                $data['password']=md5(md5($new_pwd).$i['salt']);
                $data['user_id']=$uid;
                if($model->save($data)){
                    $info=M('user')->field('user_id,exp_time')->where(array('user_id'=>session('uid')))->find();
                    if(!empty($info['exp_time'])){
                        $data['exp_time']=time();    //获取当前的时间戳
                        $data['user_id']=$info['user_id'];
                        M('user')->where(array('user_id'=>session('uid')))->save($data);  //将cookie过期时间设为当前时间
                    }
                    //清除会话
                    session('uid',null);
                    session_unset();
                    session_destroy();
                    echo <<<jump
                        <script type="text/javascript">
                        alert('修改成功，请重新登录');
                        window.top.location.href='/index.php/admin/login/login';
                        </script>
jump;
                } else{
                    $this->error('修改失败','',1);
                }
                exit;
            }
        }
        $this->display('modify_pwd');
    }

    /*
     *个人资料
     */
    public function user_info(){
        $uid=session('uid');
        $model=M('user_info');
        if(IS_POST){
            if(!$data=$model->create()){
                $this->error('登陆错误，请重新登陆后再试',U('Login/outLogin'),1);
            }
            $i=$model->find($uid);
            //p($data);
            $data['user_id']=$uid;
            if(!empty($i)){
                //p($data);
                $bool['error']=$model->save($data);
                if($bool['error']){
                    $bool['msg']="修改成功";
                }else{
                    $bool['msg']=$model->getError();
                }
            }else{
                $bool['error']=$model->add($data);
                if($bool['error']){
                    $bool['msg']="添加成功";
                }else{
                    $bool['msg']=$model->getError();
                }
            }
            if(empty($bool['msg'])){
                $bool['msg']="失败,请重试";
            }
            if($bool['error'] !==false)
                $this->success($bool['msg'],U('/index.php/admin/admin/admin'),1);
            else
                $this->error($bool['msg'],'',1);
            exit;
        }
        $info=$model->find($uid);
        $this->assign('info',$info);
        $this->display('user_info');
    }

    /*
     *个人相册
     */
    public function album(){
        $this->display('album');
    }
}
