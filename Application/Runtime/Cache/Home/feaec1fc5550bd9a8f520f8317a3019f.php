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
    .page { margin: 20px 0; text-align: center; width: 100%; overflow: hidden; }
    .page a b { color: #999; }
    .page>b, .page a { margin: 0 2px; height: 26px; line-height: 26px; border-radius: 50%; width: 26px; text-align: center; display: inline-block }
    .page a { margin: 0 2px; height: 26px; line-height: 26px; border-radius: 50%; width: 26px; text-align: center; display: inline-block }/* 针对IE6 */
    .page>b, .page a:hover { background: #333; color: #FFF; }
    .page a { color: #F33; border: #999 1px solid; }
    .sy{overflow: hidden;}
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
        <div id="bloglist" class="bloglist">
            <!--article begin-->
            <?php foreach($list as $v1):?>
            <ul>
                <h3><a href="#" ><?php echo '【',$v1['sre_name'],'】',$v1['title']?></a></h3>
                <figure><img src="/Public/Upload/<?php echo $v1['img_path']?>" />
                <span style="width:72%;float: right">
                    <p><?php echo mb_substr($v1['excerpt'],0,200),'...'?></span></p>
                    <a title="月哥哥的文章" href="/index.php/Home/Article/detail?id=<?php echo $v1['article_id']?>"  class="readmore">阅读全文>></a>
                    </span></figure>

                <p class="dateview"><span><?php echo date("Y-m-d",$v1['add_time'])?></span><span>作者：<?php echo $v1['author']?></span><span>个人博客：[<a href=/download/div/><?php echo $v1['cat_name']?></a>]</span></p>
            </ul>
            <?php endforeach;?>
            <!--article end-->

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
    <aside class="navsidebar">
       <!-- <div style="margin-top: 60px">
            <input type="text" name="q" class="bdcs-search-form-input" id="bdcs-search-form-input" placeholder="请输入关键词" style="height: 28px; line-height: 28px; width: 188px;margin-right: 10px;font-size: 14px;color: #a6a6a6">
            <input type="submit" class="bdcs-search-form-submit " id="bdcs-search-form-submit" value="搜索" style="border-color: #76923c;height: 28px;width: 50px;font-size: 14px;border-radius: 0px;background-color: #9bbb59">
        </div>-->
        <div>
          <!--  <div class="rnav">
                <h2>栏目导航</h2>
                <ul>
                    <?php foreach($left_list as $v):?>
                        <li><a href="/Home/Article/part2/<?php echo $v['cat_id']?>"><?php echo $v['cat_name']?></a></li>
                    <?php endforeach;?>


                </ul>
            </div-->>
        <!--    <div class="rnavs">
                <h2>栏目导航</h2>
                <ul>
                    <?php foreach($left_list as $v):?>
                    <li><a href="/Home/Article/part2/<?php echo $v['cat_id']?>"><?php echo $v['cat_name']?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>-->
        </div>
        <h2><p>最新文章</p></h2>
        <ul class="news">
            <?php if(is_array($news)): foreach($news as $key=>$news): ?><li><a href="/"><?php echo ($news["title"]); ?></a></li><?php endforeach; endif; ?>


        </ul>
        <h2><p>点击排行</p></h2>
        <ul class="news">
            <?php if(is_array($hots)): foreach($hots as $key=>$item): ?><li><a href="/"><?php echo ($item["title"]); ?></a></li><?php endforeach; endif; ?>

        </ul>
      <!--  <h2><p>文章归档</p></h2>
        <ul class="news">
            <li><a href="/">2008 年三月</a></li>
            <li><a href="/">2008 年四月</a></li>
            <li><a href="/">2008 年六月</a></li>
        </ul>-->

        <!--<div class="share">
            <h2>www.baidu.com</h2>
        </div>-->
    </aside>
</div>
<div id="copright">Design by <a href="#" target="_blank">yuegege</a></div>

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
        $.post("/index.php/Home/Article/part2",{type:'false',id:page_id},function(data){
            //alert(111);
            //console.log(data);
            $('#bloglist').html("");     //清空内容列表
            var list=data.list;         //获取服务器返回的内容数据
            var page=data.page;         //获取服务器返回的页码数据
            //通过循环将内容数据显示到内容区域
            $.each(list,function(i,item){
                $("#bloglist").append(
                        '<ul><h3><a href="#" >【'+item.sre_name+'】'+item.title+'</a></h3>'
                        +'<figure><img src="/Public/Upload/'+item.img_path+'" />'
                        +'<span style="width:72%;float: right">'
                        +' <p>'+item.excerpt+'</span></p>'
                        +'<a title="月哥哥的文章" href="/index.php/Home/Article/detail?id='+item.article_id+'"  class="readmore">阅读全文>></a>'
                        +'</span></figure>'
                        +'<p class="dateview"><span>'+item.add_time+'</span><span>作者：'+item.author+'</span><span>个人博客：[<a href="javascript:;">'+item.cat_name+'</a>]</span></p>'
                        +'</ul>'
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