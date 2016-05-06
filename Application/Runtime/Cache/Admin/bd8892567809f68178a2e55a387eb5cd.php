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
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改类别</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="/index.php/Admin/Category/index">返回列表</a>
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
                        <form class="form-horizontal m-t" id="signupForm" method="post" action="/index.php/Admin/Category/edit/id/12">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">名称：</label>
                                <div class="col-sm-4">
									<input id="name" name="name" class="form-control" type="text" value="<?php echo $info['cat_name']?>">
                                    <!--<span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">父级：</label>
                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="pid">
                                        <option>--顶级父类--</option>
										<?php foreach($cat_list as $v):?>
										<option value="<?php echo $v['cat_id']?>" <?php if($v['cat_id']==$info['cat_pid']) echo 'selected="selected"'?>><?php echo str_repeat('--',$v['deep']+1),$v['cat_name']?></option>
										<?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">路径：</label>
                                <div class="col-sm-4">
                                    <input id="url" name="url" class="form-control" type="text" value="<?php echo $info['url']?>">
                                    <span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 如:/Admin/Login/Login</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">描述：</label>
                                <div class="col-sm-4">
									<textarea class="form-control" name="desc" cols="" rows="" class="valid"><?php echo $info['cat_desc']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">排序：</label>
                                <div class="col-sm-4">
									<input id="sort" name="sort" value="<?php echo $info['sort_order']?>" class="form-control" type="text" aria-required="true" aria-invalid="false" class="valid">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否显示：</label>
                                <div class="col-sm-4" style="padding-top:7px;">
									<input type="radio"  checked="" value="0" i name="display" class="valid" <?php if($info['is_show']==0) echo 'checked="checked"'?>>是
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio"  value="1" name="display" class="valid" <?php if($info['is_show']==1) echo 'checked="checked"'?>>否
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
									<input type="hidden" name="id" value="<?php echo $info['cat_id']?>">
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