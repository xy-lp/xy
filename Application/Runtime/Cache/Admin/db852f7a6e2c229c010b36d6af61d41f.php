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

    <style type="text/css">
        table.imagetable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 0px;
            border-color: #999999;
            border-collapse: collapse;

        }
        table.imagetable th {

            border-width: 0px;
            padding: 10px;
            border-style: solid;
            border-color: #999999;
        }
        table.imagetable td {

            border-width: 1px;
            padding: 10px;
            border-style: dashed;
            border-color: #999999;

        }
    </style>

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加权限</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="/index.php/Admin/Role/index">返回列表</a>
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
                        <form class="form-horizontal m-t" id="signupForm" method="post" action="/index.php/Admin/Role/assign_rule/id/1">
                            <table border="0" cellspacing="0" width="70%" class="imagetable" cellpadding="0" align="center">
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr style="background: url(/Public/default/admin/images/th.gif) repeat-x;">
                                        <td nowrap=""  colspan="2" align="">
                                            <input type='checkbox' class="" name='authority_id[]' value='<?php echo ($vo1["authority_id"]); ?>'
                                            <?php
 foreach($role_auth as $val){ if($val==$vo1['authority_id']) echo "checked='checked'"; }?>/>
                                            <?php echo ($vo1["authority_name"]); ?>
                                            <!--<?php
 foreach($rule as $val){ if($val==$vo1['ru_id']) echo "checked='checked'"; }?>/>-->
                                        </td>
                                    </tr>
                                    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><tr>
                                            <?php if($vo1['authority_id'] == $vo2['pid']): ?><td nowrap="" >&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type='checkbox' name='authority_id[]' value='<?php echo ($vo2["authority_id"]); ?>'
                                                    <?php foreach($role_auth as $val){ if($val==$vo2['authority_id']) echo "checked='checked'"; }?>
                                                    /><?php echo ($vo2["authority_name"]); ?>
                                                </td><?php endif; ?>
                                            <!--<td nowrap="" >
                                              <?php if(is_array($action["child"])): $i = 0; $__LIST__ = $action["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type='checkbox' name='access[]' value='<?php echo ($vo["id"]); ?>'  <?php if(strstr($nod,$vo['id'])): ?>checked='checked'<?php endif; ?>/><?php echo ($vo["title"]); endforeach; endif; else: echo "" ;endif; ?>
                                            </td>-->
                                        </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            </table>
                            <div class="form-group" style="margin-top: 5%">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <input type="hidden" name="role_id" value="<?php echo $role_id?>">
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

    <script>
        $(function(){

        });
    </script>
</body>

</html>