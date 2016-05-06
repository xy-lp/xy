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
<link href="/Public/default/home/css/message.css" rel="stylesheet">
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
            <h3>
              <p>留言板</p></h3>
        </div>
        <div class="bloglist">
            <div class="index_about">

                <!-- Duoshuo Comment BEGIN -->
                <div data-url="" data-author-key=""  data-thread-key="740" data-category="8" class="ds-thread" id="ds-thread">
                    <div id="ds-reset">
                        <div class="ds-rounded" id="ds-hot-posts">
                            <div class="ds-header ds-gradient-bg">所有留言</div>
                            <ul id="message_list">
								<?php foreach($info['list'] as $v):?>
                                <li class="ds-post">
                                    <div data-source="duoshuo" data-root-id="0"  class="ds-post-self">
                                        <div data-user-id="12557479" class="ds-avatar">
                                            <a title="访客"  href="javascript:;" >
                                                <img alt="访客" src="/Public/default/home/images/1.jpeg">
                                            </a>
                                        </div>
                                        <div class="ds-comment-body">
                                            <div class="ds-comment-header">
                                                <a  href="javascript:;"  class="ds-user-name ds-highlight"><?PHP echo $v['visitor']?>
                                                </a>
                                            </div>
                                            <p><?PHP echo $v['message_content']?></p>
                                            <div class="ds-comment-footer ds-comment-actions">
                                                <span class="ds-time"><?php echo date('Y-m-d',$v['message_time'])?></span>

                                            </div>
                                        </div>
                                    </div>
                                </li>
								<?php endforeach;?>
                            </ul>
                        </div>
                        <div class="ds-comments-info">
                            <ul class="ds-comments-tabs">
                                <li class="ds-tab">
									<a href="javascript:void(0);" class="ds-comments-tab-duoshuo ds-current"><span class="ds-highlight"><?php echo $info['length']?></span>条评论</a>
                                </li>
                            </ul>
                        </div>
                        <!--分页-->
                        <div class="page ds-paginator">
                            <input type="hidden" id="page_count" value="<?php echo $page['page_count']?>">
                            <div class="ds-border"></div>
                            <?php for($i=1;$i<=$page['page_count'];$i++){?>
                                <a class="page <?php if($page['page_id']==$i) echo 'active'?>" href="javascript:;"><?php echo $i?></a>
                            <?php } ?>
                        </div>

                        <a name="respond"></a>
                        <div class="ds-replybox">
                            <a onclick="return false" href="javascript:void(0);" class="ds-avatar"><img alt="" src="https://avatar.duoshuo.com/avatar-50/587/39630.jpg"></a>
                            <form method="post" action="/index.php/Home/Message/message" id="message_form">
                                <div class="ds-textarea-wrapper ds-rounded-top">
                                    <textarea name="message"></textarea>
                                    <!--<textarea name="message"></textarea>
                                    <!--<pre class="ds-hidden-text"></pre>-->
                                </div>
                                <div class="ds-post-toolbar">
                                    <div class="ds-post-options ds-gradient-bg">
                                        <span class="ds-sync"></span>
                                    </div>
                                    <button type="button" class="btn ds-post-button">发布</button>

                                </div>
                            </form>
                        </div>
                  <p class="ds-powered-by">&nbsp;</p></div></div>
                <!-- Duoshuo Comment END -->
            </div>
        </div>
    </div>
    <aside class="navsidebar" style="padding-top: 50px">
        <h2><p>近期文章</p></h2>
        <ul class="news">
            <?php foreach($now_list as $nv):?>
            <li><a href="/index.php/Home/Article/detail?id=<?php echo $nv['article_id']?>"><?php echo $nv['title']?></a></li>
            <?php endforeach;?>
            <!--<li><a href="/">毕业生</a></li>
            <li><a href="/">你本来就很美</a></li>
            <li><a href="/">听说PHP</a></li>-->
        </ul>
        <h2><p>最热文章</p></h2>
        <ul class="news">
            <?php foreach($hits_list as $hv):?>
            <li><a href="/index.php/Home/Article/detail?id=<?php echo $hv['article_id']?>"><?php echo $hv['title']?></a></li>
            <?php endforeach;?>
        </ul>
        <h2><p>友情链接</p></h2>
        <ul class="news">
            <li><a href="http://www.lp.com">lpp个人博客</a></li>
        </ul>
    </aside>
</div>
<div id="copright">Design by <a href="#" target="_blank">DanceSmile</a></div>

<script type="application/javascript" src="/Public/default/home/js/jquery.js"></script>
<script>
    $(function(){
        $('.btn').bind('click',function(){
            var message=$('textarea[name=message]').val();
            if(!message){
                return false;
            }
            $.post('/index.php/Home/Message/message',{'message':message},function(data){
                if(data && data.error==false){
                    $('#message_list').html('');

                    $.each(data.msg,function(i,item){
                        var str='<li class="ds-post"><div class="ds-post-self"><div class="ds-avatar">'
                                +'<a title="访客"  href="javascript:;" ><img alt="访客" src="/Public/default/home/images/1.jpeg"></a></div>'
                                +'<div class="ds-comment-body"><div class="ds-comment-header"><a  href="javascript:;"  class="ds-user-name ds-highlight">'+item.visitor+'</a></div>'
                                +'<p>'+item.message_content+'</p>'
                                +'<div class="ds-comment-footer ds-comment-actions"><span class="ds-time">'+item.message_time+'</span></div></div></div></li>';

                        $('#message_list').append(str);
                        $('.ds-highlight').text(data.length);
                    });
                }
            },'json');
            $('textarea[name=message]').val('');
            //$(this).removeClass('active');
        });

        //点击页码的事件
        $('.page').bind('click',function(){
            var page_id = parseInt($(this).text());   //获取当前点击的页码值
            var old_page=parseInt($('.active').text());
            if(page_id == old_page){
                return false;
            }
            ajax(page_id,$(this));      //参数:page 是点击的按钮(page:页码; next:下一页; prev:上一页)
        });
    })

    //翻页操作的函数(与后台交互)
    function ajax(page_id,btn_class){
        //通过ajax将页码post提交到服务器端
        $.post("/index.php/Home/Message/message_page",{id:page_id},function(data){
            $('#message_list').html("");     //清空内容列表
            var list=data.list;         //获取服务器返回的内容数据
            var page=data.page;         //获取服务器返回的页码数据
            //通过循环将内容数据显示到内容区域
            $.each(list,function(i,item){
                var str='<li class="ds-post"><div class="ds-post-self"><div class="ds-avatar">'
                        +'<a title="访客"  href="javascript:;" ><img alt="访客" src="/Public/default/home/images/1.jpeg"></a></div>'
                        +'<div class="ds-comment-body"><div class="ds-comment-header"><a  href="javascript:;"  class="ds-user-name ds-highlight">'+item.visitor+'</a></div>'
                        +'<p>'+item.message_content+'</p>'
                        +'<div class="ds-comment-footer ds-comment-actions"><span class="ds-time">'+item.message_time+'</span></div></div></div></li>';

                $('#message_list').append(str);

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