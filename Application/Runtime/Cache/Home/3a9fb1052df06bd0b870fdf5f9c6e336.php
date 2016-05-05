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
    <div class="bloglist">
        <?php foreach($list as $v):?>
            <ul class="arrow_box">
                <div class="sy"><p><img src="/Public/Upload/<?php echo $v['img_path']?>"/><span style="font-size: 20px;color: red"><?php echo '【',$v['sre_name'],'】',$v['title']?></span></br><?php echo mb_substr($v['excerpt'],0,200),'...'?></p></div>
                <span class="dateview"><?php echo date('Y-m-d',$v['add_time'])?></span>
            </ul>
        <?php endforeach;?>
    </div>
    <div class="page">
        <a class="page active" href="javascript:;">1</a>
        <a class="page" href="javascript:;">2</a>
    </div>
</div>
<div id="copright">Design by <a href="http://www.yangqq.com" target="_blank">DanceSmile</a></div>
</body>
</html>