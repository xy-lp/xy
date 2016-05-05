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
            <h3><p>你看我 About Me</p></h3>
        </div>
        <div class="about" align="left">
            <h2>Just about me</h2>
            <ul>
                <p>时钟的指针滴滴答答，清脆的声音，像走过的青春一样美好。是的，我们都觉得美好，却又匆匆走过。虽然匆匆，却又觉得足够幸福。</p>
                <p>因为幸福的时光每一秒都是陶醉的，于是我陶醉在了这醉人的日子里。没有顾虑，没有压力，没有不开心。可就像剧终人散场时才会突然反应原来这已经是一个句号一样，然后我才惊醒，太多的美好都被随心所欲的享受填满了，都没有来得及挥手道别，或许还是太过不成熟，所以匆匆...</p>
                <p>可是，多么惊喜，美好的日子并没有完全浪费，在美好的时光里可以遇到很多美丽的事和人。一个人总是显得那么的孤单，相同心情的心灵和心灵的撞击才会有丰富的色彩。所以，多么美好，我变成了我们。感恩，这美好的青春走了，给我留下了一起走了很久可以一直走到永远的好朋友。一起走，开始大步流星，方向明确。或许一加一大于二，所以幸福...</p>
                <p>
                    回头看走过的路，深深浅浅的脚印，当初多么坎坷艰难，现在都变得没什么所谓，当初多少欢声笑语，现在也都变得云淡风轻。我们渐渐明白，不同的年龄阶段都有不同的乐章和特有的旋律，有的年纪就应该用来天真，有的年纪就应该用来懂事，有的年纪就应该用来浪漫，有的年纪就应该用来努力。
                </p>
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
                <p>现居：上海</p>
                <p>职业：程序猿</p>
                <p>副业：程序媛</p>
                <p><a target="_blank" href=""></a></p>

            </div>
        </aside>
</div>
<div id="copright">Design by <a href="#" target="_blank">yuegege</a></div>
</body>
</html>