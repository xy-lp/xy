<?php if (!defined('THINK_PATH')) exit();?><!--head start-->
<!doctype html>
<html>
<head>
    <meta charset="utf8">
    <title>Yuegege</title>
    <meta name="Keywords" content="" >
    <meta name="Description" content="" >
    <link href="/Public/default/home/css/index.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    <!--[if lt IE 9]>
    <script src="/Public/default/home/js/modernizr.js"></script>
    <![endif]-->



		  



<link href="/Public/default/home/css/mood.css" rel="stylesheet">
<style type="text/css">
    .bloglist h3:first-child a {
        color: #f00;
        /*background: url(/skin/blog/images/new.gif) no-repeat 330px;*/
        display: block;
    }
    .bloglist figure img {
        padding: 4px;
        border: #f4f2f2 1px solid;
        width: 175px;
    }
    .bloglist figure span {
        width:72%;
        float: right
    }
    a.readmore {
        background: #fd8a61;
        color: #fff;
        padding: 5px 10px;
        float: right;
        margin: 20px 0 0 0
    }
    .active{
        background:#333;
        color:#FFF;
    }
</style>
<!--head end-->

<!--top start-->
</head>
<body>
<header>
    <h1><a href="/">Yuegege</a></h1>
    <p>青春是手牵手坐上了永不回头的火车.......</p>
</header>
<div id="nav">
    <ul>
        <?php foreach($top_list as $v):?>
            <li><a href="<?php echo $v['url']?>"><?php echo $v['cat_name']?></a></li>
        <?php endforeach;?>
    </ul>
    <script src="/Public/default/home/js/silder.js"></script><!--获取当前页导航 高亮显示标题-->
</div>
<div class="blank"></div>
<!--top end-->

<div class="article">
    <div class="content">
        <div class="topblog" style="height: auto">
            <h3><p><?php echo $cat_name?></p></h3>
        </div>
    </div>
    <div id="bloglist" class="bloglist">
        <?php foreach($list as $v):?>
            <ul class="arrow_box"><a href="/index.php/Home/Article/detail?id=<?php echo $v['article_id']?>">
                <div class="sy"><p><img src="/Public/Upload/<?php echo $v['img_path']?>"/><span style="font-size: 20px;color: red"><?php echo '【',$v['sre_name'],'】',$v['title']?></span></br><?php echo mb_substr($v['excerpt'],0,200),'...'?></p></div>
                <span class="dateview"><?php echo date('Y-m-d',$v['add_time'])?></span>
            </a></ul>
        <?php endforeach;?>
    </div>

    <!--page start-->
    <div class="page">
    <input type="hidden" id="page_count" value="<?php echo $page['page_count']?>">
    <?php for($i=1;$i<=$page['page_count'];$i++){?>
        <a class="page <?php if($page['page_id']==$i) echo 'active'?>" href="javascript:;"><?php echo $i?></a>
    <?php } ?>
</div>
    <!--page end-->

</div>
<div id="copright">Design by <a href="http://www.yangqq.com" target="_blank">yuegege</a></div>

<script src="/Public/default/admin/js/jquery.min.js?v=2.1.4"></script>
<script>
    $(document).ready(function(){
        //点击页码的事件
        $('.page').bind('click',function(){
            var page_id = parseInt($(this).text());   //获取当前点击的页码值
            var old_page=parseInt($('.active').text());
            if(page_id == old_page){
                return false;
            }
            ajax(page_id,$(this));      //参数:page 是点击的按钮(page:页码; next:下一页; prev:上一页)
        });
    });

    //翻页操作的函数(与后台交互)
    function ajax(page_id,btn_class){
        //通过ajax将页码post提交到服务器端
        $.post("/index.php/Home/Article/part1",{id:page_id},function(data){
            $('#bloglist').html("");     //清空内容列表
            var list=data.list;         //获取服务器返回的内容数据
            var page=data.page;         //获取服务器返回的页码数据
            //通过循环将内容数据显示到内容区域
            $.each(list,function(i,item){
                $("#bloglist").append(
                        '<ul class="arrow_box"><a href="/index.php/Home/Article/detail?id='+item.article_id+'"><div class="sy"><p>'
                        +'<img src="/Public/Upload/'+item.img_path+'"/>'
                        +'<span style="font-size: 20px;color: red">【'+item.sre_name+'】'+item.title+'</span></br>'+item.excerpt+'</p></div>'
                        +'<span class="dateview">'+item.add_time+'</span>'
                        +'</a></ul>'
                );

            });
            //修改总页码数
            $('#page_count').val(page.page_count);
            var active=$('.active');    //获得被选中的页码元素
            active.removeClass("active");   //清除页码被选中效果
            //在对应的页码上加上选中的效果
            if(btn_class == 'next'){
                active.next().addClass("active");
            }else if(btn_class == 'prev'){
                active.prev().addClass("active");
            }else{
                btn_class.addClass("active");
            }
        },'json');
    }

</script>

</body>
</html>