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
            $message=$_POST['message'];
            //var_dump($message) ;exit;
            $data=array(
                'message_content'=>$message,
                'message_time'  => time(),
                //'visitor_ip'    => '127.0.0.1',
                'visitor'   => '匿名',
            );
            if(!M('Message')->add($data)){
                $return['error']=true;
                $return['msg']='发布失败';
            }else{
                $i=$this->get_list($page_id);
                $return['error']=false;
                $return['msg']=$i['list'];
                $return['page']=$i['page'];
            }
            echo json_encode($return);
            exit;
        }
        $model=D('Article');
        //近期文章
        $now_list= $model->get_new();
        $this->assign('now_list',$now_list);

        $i=$this->get_list($page_id);

        //最热文章
        $hits_list= $model->get_hits();
        $this->assign('hits_list',$hits_list);
        $this->assign('info',$i);
        $this->display('message');
    }

    private function get_list($page_id=1){
        $list=M('Message')->order('message_id desc')->select();
        $len=sizeof($list);
        $i=data_page($list,$page_id);
        $i['length']=$len;
        return $i;
    }
}
