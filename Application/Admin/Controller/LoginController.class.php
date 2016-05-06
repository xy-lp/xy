<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/29
 * Time: 15:09
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    //显示登录页面
    public function login(){
        $identity=$_COOKIE['identity'];
        if(!empty($identity)){
            $model=M('user');
            $token=$_COOKIE['token'];
            $info=$model->where(array('identity'=>$identity,'token'=>$token))->field('user_name,token,exp_time,user_role')->find();
            if($info && $info['exp_time']>time()){
                $data['login_time']=time();     //获取当前的时间戳
                $data['login_ip']=ip2long($_SERVER['SERVER_ADDR']);   //获取当前的ip地址
                $model->where(array('user_name'=>$info['user_name']))->save($data);   //将数据库中登录时候和ip地址更新
                //获取账号权限，并写入session
                $rule=M('role')->field('rules')->where(array('role_id'=>$info['user_role']))->find();    //获取账号相应的权限
                session('rules',$rule['rules']);      //将账号的权限保存到session中
                session('uid',$info['user_id']);  //将账号保存到session中
                $this->redirect('Admin/admin');
                exit;
            }
        }
        $this->display();
    }
    //执行登录操作
    public function checkLogin(){
        if(Is_POST){
            /*$verify=new Verify();
            //验证验证码是否正确
            if(!$verify->check(I('post.code'))){
                $this->error('验证码错误！',U('Login/login'),1);
            }*/

            $model=M('user');      //实例化user表
            $map['user_name']=I('post.username');
            $password=I('post.password');
            if($map['user_name'] == C('username') && $password == C('password')){
                $rule=M('role')->field('rules')->find();    //获取账号相应的权限
                session('uid','-1');  //将账号保存到session中
                session('rules',$rule['rules']);
                $this->success('特殊账号',U('Admin/admin'),1);
                exit;
            }
            $map['status']=0;
            $i=$model->where($map)->find();    //获取user表中相应的记录
            if(!$i){
                $this->error('该账号不存在,或者已停用！',U('login'),1);
            }
            $data['user_name']=$map['user_name'];
            $pwd=md5(md5($password).$i['salt']);     //获取提交的密码
            if(!$i || $i['password']!=$pwd){
                $this->error('密码错误，请重新输入！',U('login'),1);
            }
            if(empty($i['user_role'])){      //判断账号是否拥有权限
                $this->error('您的账号没有权限！',U('login'),1);
            }
            $save_pwd=isset($_POST['remember'])?$_POST['remember']:0;
            if($save_pwd!==0){
                $data['identity'] = md5($i['user_name']);
                $data['token'] = md5(uniqid(rand(), TRUE));
                cookie('identity',$data['identity'],3600*24*7);
                cookie('token',$data['token'],3600*24*7);
                $data['exp_time']=time()+(3600*24*7);    //获取当前的时间戳
                //p($data);
            }
            //更改数据库中该账号的登录时间和ip地址
            $data['login_time']=time();     //获取当前的时间戳
            $data['login_ip']=ip2long($_SERVER['SERVER_ADDR']);   //获取当前的ip地址
            $model->where(array('user_name'=>$data['user_name']))->save($data);   //将数据库中登录时候和ip地址更新
            //获取账号权限，并写入session
            $rule=M('role')->field('rules')->where(array('role_id'=>$i['user_role']))->find();    //获取账号相应的权限
            session('rules',$rule['rules']);      //将账号的权限保存到session中
            //session('username',$data['user_name']);  //将账号保存到session中
            session('uid',$i['user_id']);  //将账号保存到session中
            $this->success('登录成功',U('Admin/admin'),1);
        }
    }
    //退出操作
    public function outLogin(){
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
        $this->redirect('Login/login');
    }

    /*
     * 安全退出
     */
    public function safe_exit(){
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
        $this->redirect('Login/login');
    }
}
