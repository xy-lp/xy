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
            <h3><p><?php echo $cat_name?></p></h3>
        </div>
        <div class="bloglist">
            <!--article begin-->
            <?php foreach($list as $v1):?>
            <ul>
                <h3><a href="#" ><?php echo '【',$v1['sre_name'],'】',$v1['title']?></a></h3>
                <figure><img src="/Public/Upload/<?php echo $v1['img_path']?>" />
                <span style="width:72%;float: right">
                    <p><?php echo mb_substr($v1['excerpt'],0,200),'...'?></span></p>
                    <a title="【活动作品】柠檬绿兔小白个人博客模板" href="#"  target="_blank" class="readmore">阅读全文>></a>
                    </span></figure>

                <p class="dateview"><span><?php echo date("Y-m-d",$v1['add_time'])?></span><span>作者：<?php echo $v1['author']?></span><span>个人博客：[<a href=/download/div/><?php echo $v1['cat_name']?></a>]</span></p>
            </ul>
            <?php endforeach;?>
            <!--article end-->




        </div>
    </div>
    <aside class="navsidebar">
        <div style="margin-top: 60px">
            <input type="text" name="q" class="bdcs-search-form-input" id="bdcs-search-form-input" placeholder="请输入关键词" style="height: 28px; line-height: 28px; width: 188px;margin-right: 10px;font-size: 14px;color: #a6a6a6">
            <input type="submit" class="bdcs-search-form-submit " id="bdcs-search-form-submit" value="搜索" style="border-color: #76923c;height: 28px;width: 50px;font-size: 14px;border-radius: 0px;background-color: #9bbb59">
        </div>
        <div>
            <div class="rnav">
                <h2>栏目导航</h2>
                <ul>
                    <?php foreach($left_list as $v):?>
                        <li><a href="/Home/Article/part2/<?php echo $v['cat_id']?>"><?php echo $v['cat_name']?></a></li>
                    <?php endforeach;?>


                </ul>
            </div>
            <div class="rnavs">
                <h2>栏目导航</h2>
                <ul>
                    <?php foreach($left_list as $v):?>
                    <li><a href="/Home/Article/part2/<?php echo $v['cat_id']?>"><?php echo $v['cat_name']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <h2><p>最新文章</p></h2>
        <ul class="news">
            <li><a href="/">女孩都有浪漫的小情怀</a></li>
            <li><a href="/">也许下个路口就会遇见希望</a></li>
            <li><a href="/">6月毕业季，祝福送给你</a></li>
            <li><a href="/">生活常有缺席的-可搞笑从来不缺席</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">妹妹，明天你就要嫁人啦</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
        </ul>
        <h2><p>点击排行</p></h2>
        <ul class="news">
            <li><a href="/">女孩都有浪漫的小情怀</a></li>
            <li><a href="/">也许下个路口就会遇见希望</a></li>
            <li><a href="/">6月毕业季，祝福送给你</a></li>
            <li><a href="/">生活常有缺席的-可搞笑从来不缺席</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">妹妹，明天你就要嫁人啦</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
            <li><a href="/">为了一个不存在的梦，执念了那么多年</a></li>
        </ul>
        <h2><p>文章归档</p></h2>
        <ul class="news">
            <li><a href="/">2008 年三月</a></li>
            <li><a href="/">2008 年四月</a></li>
            <li><a href="/">2008 年六月</a></li>
        </ul>
        <h2><p>友情链接</p></h2>
        <ul class="news">
            <li><a href="#">杨青个人博客</a></li>
        </ul>
        <div class="share">
            <h2></h2>
        </div>
    </aside>
</div>
<div id="copright">Design by <a href="#" target="_blank">DanceSmile</a></div>
</body>
</html>