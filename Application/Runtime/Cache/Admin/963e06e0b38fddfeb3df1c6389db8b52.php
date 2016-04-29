<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Y+ 月哥哥后援会</title>

    <link rel="shortcut icon" href="/Public/default/admin/favicon.ico"> <link href="/Public/default/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/default/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/default/admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/default/admin/css/style.min.css?v=4.0.0" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改密码</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="/index.php/Admin/User/index">返回列表</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" id="signupForm" method="post" action="/index.php/Admin/User/modify_pwd?v=4.0">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">原密码：</label>
                                <div class="col-sm-4">
                                    <input id="password" name="password" class="form-control" type="password">
                                    <!--<span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">新密码：</label>
                                <div class="col-sm-4">
                                    <input id="pwd" name="pwd" class="form-control" type="password">
                                    <!--<span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">重复密码：</label>
                                <div class="col-sm-4">
                                    <input id="ppwd" name="ppwd" class="form-control" type="password">
                                    <!--<span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/default/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/default/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/Public/default/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/default/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/Public/default/admin/js/plugins/validate/messages_zh.min.js"></script>
    <!--<script src="/Public/default/admin/js/demo/form-validate-demo.min.js"></script>-->
</body>

</html>