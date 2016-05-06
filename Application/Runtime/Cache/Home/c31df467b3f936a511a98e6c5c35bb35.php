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



		  



<link href="/Public/default/home/css/learn.css" rel="stylesheet">
<link href="/Public/default/home/css/about.css" rel="stylesheet">
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
            <h3><a href="/index.php/Admin/admin/admin"><p>随便看 About Me</p></a></h3>
        </div>
        <div class="about" align="left">
            <h2><?php echo ($about["title"]); ?></h2>
            <ul>
                <?php echo htmlspecialchars_decode($about['content'])?>
            </ul>
            <!--<h2>About my blog</h2>
            <p>域  名：www.yuegege.com 创建于2016年01月1日</p>
            <p>服务器：阿里云服务器</p>
            <p>程  序：PHP 帝国CMS7.0</p>-->


        </div>
        </div>
        <aside align="left">
            <div class="about_c">
                <p>网名：<span>yuegege</span> </p>
                <p>姓名：谢月 </p>
                <p>籍贯：安徽</p>
                <p>现居：杭州</p>
                <p>职业：程序猿</p>
                <p>副业：程序媛</p>
                <p><a target="_blank" href=""></a></p>

            </div>
        </aside>
</div>
<div id="copright">Design by <a href="#" target="_blank">yuegege</a></div>
</body>
</html>