<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/30
 * Time: 0:28
 */
namespace Home\Controller;
use Think\Controller;
class MessageController extends BaseController{
    /*
     * 留言板
     */
    public function message($page_id=1){
        if(IS_POST){
            $message=I('post.message');
            var_dump($message) ;exit;
            $data=array(
                'message_content'=>$message,
                'message_time'  => time(),
                'visitor_ip'    => $_SERVER["REMOTE_ADDR"],
                'visitor'   => 'visitor'.rand(10,10000),
            );
            if(M('Message')->add($data)){
                $return['error']=true;
                $return['msg']='发布失败';
            }else{
                $return['error']=false;
                $list=M('Message')->order('message_id desc')->select();
                $i=data_page($list,$page_id);
                $return['msg']=$i['list'];
                $return['page']=$i['page'];
            }
            echo json_encode($return);
            exit;
        }
        $this->display('message');
    }
}