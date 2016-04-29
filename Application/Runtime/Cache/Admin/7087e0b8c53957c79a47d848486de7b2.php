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
                        <h5>修改文章</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="/index.php/Admin/Article/index">返回列表</a>
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
                        <form class="form-horizontal m-t" id="signupForm" method="post" action="/index.php/Admin/Article/edit/id/1" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">标题：</label>
                                <div class="col-sm-4">
									<select class="select1" name="sre"><option value="0">请选择出处</option>
										<?php foreach($sre_list as $v): ?>
										<option value="<?php echo $v['sre_id']?>" <?php if($v['sre_id']==$info['sre_id']) echo 'selected="selected"'?>><?php echo '---',$v['sre_name'],'---'?></option>
										<?php endforeach; ?>
									 </select>
									 <input id="title" name="title" class="form-control" type="text" value="<?php echo $info['title']?>">
                                    <!--<span class="help-block m-b-none"><i class="fa fa-info-circle"></i> 这里写点提示的内容</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">作者：</label>
                                <div class="col-sm-4">
									<input id="author" name="author" class="form-control" type="text" value="<?php echo $info['author']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">类别：</label>
                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="pid">
                                        <option value="0">--请选择类别--</option>
										<?php foreach($cat_list as $v):?>
										<option value="<?php echo $v['cat_id']?>" <?php if($v['cat_id']==$info['cat_id']) echo 'selected="selected"'?>><?php echo str_repeat('--',$v['deep']*2),$v['cat_name']?></option>
										<?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">摘要：</label>
                                <div class="col-sm-6">
									<textarea class="form-control" name="excerpt" cols="" rows="8" class="valid"><?php echo $info['excerpt']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">缩略图：</label>
                                <div class="col-sm-4">
                                    <input type="FILE" name="img_path">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">内容：</label>
                                <div class="col-sm-12">
									<input type="hidden" id="content" name="content" value="<?php echo $info['content']?>" style="display:none">
									<input type="hidden" id="content___Config" value="" style="display:none">
									<iframe id="content___Frame" src="/Public/default/admin/fckeditor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Normal" width="100%" height="420" frameborder="0" scrolling="no" style="margin: 0px; padding: 0px; border: 0px; background-color: transparent; background-image: none; width: 100%; height: 420px;"></iframe>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否显示：</label>
                                <div class="col-sm-4" style="padding-top:7px;">
									<input type="radio"  checked="" value="0" id="display" name="display" class="valid" <?php if($info['status']==0) echo 'checked="checked"'?>>显示
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio"  value="1" id="display" name="display" class="valid" <?php if($info['status']==1) echo 'checked="checked"'?>>不显示
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否允许评论：</label>
                                <div class="col-sm-4" style="padding-top:7px;">
									<input type="radio"  checked="" value="0" id="discuss" name="discuss" class="valid" <?php if($info['is_discuss']==0) echo 'checked="checked"'?>>允许
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio"  value="1" id="discuss" name="discuss" class="valid" <?php if($info['is_discuss']==1) echo 'checked="checked"'?>>不允许
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">是否置顶：</label>
								<div class="col-sm-4" style="padding-top:7px;"> <input type="radio" value="0" id="top" name="top" class="valid" <?php if($info['is_top']==0) echo 'checked="checked"'?>>置顶
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="radio"  value="1" id="top" name="top" checked="" class="valid" <?php if($info['is_top']==1) echo 'checked="checked"'?>>不置顶
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
									<input type="hidden" name="id" value="<?php echo $info['article_id']?>">
                                    <button class="btn btn-primary" type="submit">修改</button>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-primary" type="button">保存草稿</button>
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