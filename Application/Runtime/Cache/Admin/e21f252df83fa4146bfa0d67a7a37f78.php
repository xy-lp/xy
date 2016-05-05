<?php if (!defined('THINK_PATH')) exit();?><!--head start-->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <title>Y+ 月哥哥后援会</title>

    <link rel="shortcut icon" href="/Public/default/admin/favicon.ico">
    <link href="/Public/default/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/default/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/Public/default/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/Public/default/admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/default/admin/css/style.min.css?v=4.0.0" rel="stylesheet">

<!--head end-->
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins border-bottom">
                    <div class="ibox-title">
						<h5><?php echo $list['title']?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="tabs_panels.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="/index.php/Admin/Article/index">返回列表</a>
                                </li>
                                <li><a href="tabs_panels.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
						<p> <?php echo htmlspecialchars_decode($list['content'])?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/default/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/default/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/default/admin/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/Public/default/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/Public/default/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/Public/default/admin/js/content.min.js?v=1.0.0"></script>

</body>

</html>