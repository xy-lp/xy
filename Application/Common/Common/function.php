<?php 
function p($tmp){
    echo '<pre>';
    var_dump($tmp);
    exit;
}

/*
 * 树结构数组通过页码获取当页相应的记录
 * @param $data array 总数据（二维数组，树结构）
 * @param $page_id int 当前页码
 */
function data_page($data,$page_id=1){
    $page_size=C('PAGE_SIZE');
    $count=count($data);
    $page_count=ceil($count/$page_size);
    if(empty($page_count)){
        $page_count=1;
    }

    if($page_id<=0)
        $page_id=1;
    if($page_id>$page_count)
        $page_id=$page_count;

    $page_header=($page_id-1)*$page_size;
    $page_last=$page_header+$page_size;
    $list=array();

    foreach($data as $k=>$v){
        if($k+1>$page_header && $k+1<=$page_last){
            $list[$k]=$v;
        }
    }
    $page=array('count'=>$count,'page_size'=>$page_size,'page_count'=>$page_count,'page_id'=>$page_id);
    return array('list'=>$list,'page'=>$page);
}

