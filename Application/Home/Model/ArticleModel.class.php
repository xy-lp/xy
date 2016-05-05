<?php
/**
 * Created by PhpStorm.
 * User: just
 * Date: 16/5/1
 * Time: 下午7:29
 */
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model{
    public function get_hits(){
        return  M('article')->order('hits desc')->where(array('status'=>0,'is_show'=>0))->limit(5)->select();
    }

    public function get_new(){
        return  M('article')->order('article_id desc')->where(array('status'=>0,'is_show'=>0))->limit(5)->select();
    }
}