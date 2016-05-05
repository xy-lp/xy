<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->


    <title>H+ 后台主题UI框架 - 主页示例</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/default/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/default/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/default/admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/default/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
    <base target="_blank">

</head>

<body class="gray-bg">
    <div class="row  border-bottom white-bg dashboard-header">
        <!--<div class="col-sm-12">
            <blockquote class="text-warning" style="font-size:14px">您是否需要自己做一款后台、会员中心等等的，但是又缺乏html等前端知识…
                <br>您是否一直在苦苦寻找一款适合自己的后台主题…
                <br>您是否想做一款自己的web应用程序…
                <br>…………
                <h4 class="text-danger">月哥哥</h4>
            </blockquote>

            <hr>
        </div>-->
       <!-- <div class="col-sm-3">
            <h2>Hello,Guest</h2>
            <small>移动设备访问请扫描以下二维码：</small>
            <br>
            <br>
            <img src="/Public/default/admin/img/qr_code.png" width="100%" style="max-width:264px;">
            <br>
        </div>-->
        <!--<div class="col-sm-5">
            <h2>
                            H+ 后台主题UI框架
                        </h2>
            <p>H+是一个完全响应式，基于Bootstrap3.3.5最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本(v2.1.4)，当然，也集成了很多功能强大，用途广泛的jQuery插件，她可以用于所有的Web应用程序，如<b>网站管理后台</b>，<b>网站会员中心</b>，<b>CMS</b>，<b>CRM</b>，<b>OA</b>等等，当然，您也可以对她进行深度定制，以做出更强系统。</p>
            <p>
                <b>当前版本：</b>v4.0.0
            </p>
            <p>
                <b>定价：</b><span class="label label-warning">&yen;988（不开发票，不议价）</span>
            </p>
            <br>
            <p>
                <a class="btn btn-success btn-outline" href="http://wpa.qq.com/msgrd?v=3&uin=516477188&site=qq&menu=yes" target="_blank">
                    <i class="fa fa-qq"> </i> 联系我
                </a>
                <a class="btn btn-white btn-bitbucket" href="http://www.zi-han.net" target="_blank">
                    <i class="fa fa-home"></i> 访问博客
                </a>
            </p>
        </div>-->
       <!-- <div class="col-sm-4">
            <h4>H+具有以下特点：</h4>
            <ol>
                <li>完全响应式布局（支持电脑、平板、手机等所有主流设备）</li>
                <li>基于最新版本的Bootstrap 3.3.4</li>
                <li>提供3套不同风格的皮肤</li>
                <li>支持多种布局方式</li>
                <li>使用最流行的的扁平化设计</li>
                <li>提供了诸多的UI组件</li>
                <li>集成多款国内优秀插件，诚意奉献</li>
                <li>提供盒型、全宽、响应式视图模式</li>
                <li>采用HTML5 & CSS3</li>
                <li>拥有良好的代码结构</li>
                <li>更多……</li>
            </ol>
        </div>-->

    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-4">

                <!--<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>二次开发</h5>
                    </div>
                    <div class="ibox-content">
                        <p>我们提供基于H+的二次开发服务，具体费用请联系作者。</p>
                        <p>同时，我们也提供以下服务：</p>
                        <ol>
                            <li>基于WordPress的网站建设和主题定制</li>
                            <li>PSD转WordPress主题</li>
                            <li>PSD转XHTML</li>
                            <li>Html页面（CSS+XHTML+jQuery）制作</li>
                        </ol>
                    </div>
                </div>-->
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>联系信息</h5>

                    </div>
                    <div class="ibox-content">
                        <p><i class="fa fa-send-o"></i> 博客：<a href="http://www.zi-han.net" target="_blank">http://www.yuegege.com</a>
                        </p>
                        <p><i class="fa fa-qq"></i> QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=516477188&site=qq&menu=yes" target="_blank">247496283</a>
                        </p>
                        <p><i class="fa fa-weixin"></i> 微信：<a href="javascript:;">yuegege</a>
                        </p>
                        <p><i class="fa fa-credit-card"></i> 支付宝：<a href="javascript:;" class="支付宝信息">247496283@qq.com /月哥哥</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>最新博文</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <div class="panel-body">
                            <div class="panel-group" id="version">
                                <?php if(is_array($article)): foreach($article as $key=>$item): ?><div class="panel panel-default">
                                        <div class="panel-heading" onclick="location.href='/index.php/Admin/Article/look/id/<?php echo ($item["article_id"]); ?>'">
                                            <h5 class="panel-title">
                                                <a  href="javascript:;"><?php if(mb_strlen($item['title'])>=18) echo mb_substr($item['title'],0,17),'...'; else echo $item['title']?><code class="pull-right"><?PHP echo date('Y-m-d',$item['add_time'])?></code></a>
                                            </h5>
                                        </div>

                                    </div><?php endforeach; endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>最新留言</h5>
                    </div>
                    <div class="ibox-content no-padding">
                        <div class="panel-body">
                            <div class="panel-group" id="message">
                                <?php if(is_array($message)): foreach($message as $key=>$item): ?><div class="panel panel-default">
                                        <div class="panel-heading" onclick="location.href='/index.php/Admin/Article/look/id/<?php echo ($item["article_id"]); ?>'">
                                            <h5 class="panel-title">
                                                1111
                                                <a  href="javascript:;"><?php if(mb_strlen($item['title'])>=18) echo mb_substr($item['title'],0,17),'...'; else echo $item['title']?><code class="pull-right"><?php echo (date("Y-m-d",$item["add_time "])); ?></code></a>
                                            </h5>
                                        </div>

                                    </div><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/Public/default/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/default/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/default/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/Public/default/admin/js/content.min.js"></script>
    <script src="/Public/default/admin/js/welcome.min.js"></script>
</body>

</html>