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
                        <h5>出处模块 简介</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="tabs_panels.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <!--<ul class="dropdown-menu dropdown-user">
                                <li><a href="tabs_panels.html#">选项1</a>
                                </li>
                                <li><a href="tabs_panels.html#">选项2</a>
                                </li>
                            </ul>-->
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content" style="display: none;">
                        <p>出处模块主要运用在以下几个地方：</p>
                        <ul>
                            <li>发表文章时选择的出处</li>
                            <li>前台文章列表区域文章标题前的出处</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>出处列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="/index.php/Admin/Source/index?v=4.0/index">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <!--<a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                                <i class="fa fa-wrench"></i>
                            </a>-->
                            <!--<ul class="dropdown-menu dropdown-user">
                                <li><a href="table_data_tables.html#">选项1</a>
                                </li>
                                <li><a href="table_data_tables.html#">选项2</a>
                                </li>
                            </ul>-->
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <div class="">
                            <a href="/index.php/Admin/Source/add" class="btn btn-primary ">添加出处</a>
                        </div>
                       <!-- <div class="row">
                            <div class="col-sm-6">
                                <div id="editable_length" class="dataTables_length">
                                    <label >每页
                                        <select class="input-sm" aria-controls="editable" name="editable_length">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>条记录
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_filter" id="editable_filter">
                                    <label>查找：
                                        <input aria-controls="editable" class="input-sm" type="search">
                                        <a href="javascript:;" class="btn btn-primary ">搜索</a>
                                    </label>
                                </div>
                            </div>
						</div>-->
                        <table class="table table-striped table-bordered table-hover " id="editable">
                            <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>出处名称</th>
                                    <th>状态(0:正常,1:停用)</th>
                                    <th>排序值</th>
                                    <th style="width:15%">操作</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                            <!--data_table start-->
                            <?php foreach($list as $v):?>
                                <tr class="gradeA">
                                    <td><?php echo $v['sre_id']?></td>
                                    <td><?php echo $v['sre_name']?></td>
                                    <td>
                                        <img alt="" src="/Public/default/admin/img/<?php echo empty($v['status'])?'yes':'no';?>.gif"/>
                                    </td>
                                    <td><?php echo $v['sort_order']?></td>
                                    <td>
										<a class="btn btn-white " href="/index.php/Admin/Source/edit/id/<?php echo $v['sre_id']?>"><i class="fa"></i>修改</a>
										<a class="btn btn-white " href="/index.php/Admin/Source/del/id/<?php echo $v['sre_id']?>" onclick="if(confirm('确定删除！')==false)return false;"><i class="fa"></i>删除</a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            <!--data_table end-->
                            </tbody>
                        </table>
                        <!--page start-->
                        <div class="row">
	<div class="col-sm-5">
		<div class="dataTables_info">
			<input type="hidden" id="page_count" value="<?php echo $page['page_count']?>">
			共<i id="count"><?php echo $page['count']?></i>条记录，当前显示第&nbsp;<i id="page_id"><?php echo $page['page_id']?>&nbsp;</i>页
		</div>
	</div>
	<div class="col-sm-7" align="right">
		<div class="dataTables_paginate paging_simple_numbers">
			<ul class="pagination">
				<li class="paginate_button prev <?php if($page['page_id']==1) echo 'disabled'?> ">
					<a href="javascript:;">上一页</a>
				</li>
				<?php for($i=1;$i<=$page['page_count'];$i++){?>
					<li class="paginate_button page <?php if($page['page_id']==$i) echo 'active'?>"><a href="javascript:;"><?php echo $i;?></a></li>
				<?php }?>
				<li class="paginate_button next <?php if($page['page_id']==$page['page_count']) echo 'disabled'?>">
					<a href="javascript:;">下一页</a>
				</li>
			</ul>
		</div>
	</div>
</div>

                        <!--page end-->
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

            //点击上一页的事件
			$('.prev').bind('click',function(){
				var prev=$('.prev');
                //如果上一页又不可点击的属性,则不继续执行
				if(prev.hasClass("disabled")){
					return false;
				}
                //获取当前页码的上一页页码
				var page_id=parseInt($('.active').text())-1;
                //如果上一页的页面小于1,则不继续执行
				if(page_id<1){
					return false;
				}
                //执行翻页操作
				ajax(page_id,'prev');
			});

            //点击下一页的事件
			$('.next').bind('click',function(){
                var next=$('.next');
                //如果下一页又不可点击的属性,则不继续执行
				if(next.hasClass("disabled")){
					return false;
				}
                //获取当前页码的下一页页码
				var page_id=parseInt($('.active').text())+1;
                //获取总页码数
				var page_count=$('#page_count').val();
                //如果下一页页码大于总页码,则不继续执行
				if(page_id > page_count){
					return false;
				}
                //执行翻页操作
				ajax(page_id,'next');
            });
        });

        //翻页操作的函数(与后台交互)
		function ajax(page_id,btn_class){
                //通过ajax将页码post提交到服务器端
				$.post("/index.php/Admin/Source/index?v=4.0",{id:page_id},function(data){
					$('#content').html("");     //清空内容列表
					var list=data.list;         //获取服务器返回的内容数据
					var page=data.page;         //获取服务器返回的页码数据
                    //通过循环将内容数据显示到内容区域
					$.each(list,function(i,item){
						$("#content").append(
                               "<tr class='gradeA'>"
                                    +"<td>"+item.sre_id+"</td>"
                                    +"<td>"+item.sre_name+"</td>"
									+"<td><img alt='' src='"+"/Public/default/admin"+"/img/"+item.status_img+".gif'/></td>"
									+"<td>"+item.sort_order+"</td>"
                                    +"<td>"
										+'<a class="btn btn-white" href="/index.php/Admin/Source/edit/id/'+item.sre_id+'"><i class="fa"></i>修改</a>'
										+'<a class="btn btn-white" href="/index.php/Admin/Source/del/id/'+item.sre_id+'"><i class="fa"></i>删除</a>'
                                    +"</td>"
                               +"</tr>"
								);
					});
                    //修改总记录数
					$('#count').text(page.count);
                    //修改当前第几页
					$('#page_id').text(page.page_id);
                    //修改总页码数
					$('#page_count').text(page.page_count);
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
                    //如果页码为1,添加上一页不可点击的效果,反之则清除该效果
					if(page.page_id == 1){
						$('.prev').addClass("disabled");
					}else{
						$('.prev').removeClass("disabled");
					}
                    //如果页码等于总页面,添加下一页不可点击的效果,反之则清除该效果
					if(page.page_id == page.page_count){
						$('.next').addClass("disabled");
					}else{
						$('.next').removeClass("disabled");
					}
				},'json');
		}

    </script>

</body>

</html>