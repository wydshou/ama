<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"E:\WWW\ymx./app/admin\view\role\adminlist.html";i:1540809138;s:42:"E:\WWW\ymx\app\admin\view\Public\meta.html";i:1540801719;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/public/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/public/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/public/static/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/public/static/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/public/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/public/static/lib/laypage/1.2/laypage.js"></script>

<title>管理员列表</title> 
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
		<a href="javascript:;" onclick='admin_add("添加管理员","<?php echo url("Role/admin_add"); ?>","800","500")' class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>角色</th>
				<th width="130">加入时间</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>

		<?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td>
				<td><?php echo $vo['user_name']; ?></td>
				<td><?php echo !empty($vo['telephone'])?$vo['telephone'] : '无'; ?></td>
				<td><?php echo !empty($vo['email'])?$vo['email'] : '无'; ?></td>
				<td>超级管理员</td>
				<td><?php echo date('Y-m-d H:i:s',$vo['create_time']); ?></td>
				<td class="td-status">
					<?php switch($vo['status']): case "0": ?><span class="label label-default radius">已禁用</span><?php break; case "1": ?><span class="label label-success radius">已启用</span><?php break; endswitch; ?>
				</td>
				<td class="td-manage"><a style="text-decoration:none" onClick="admin_stop(this,'<?php echo $vo['admin_id']; ?>')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick='admin_edit("管理员编辑","<?php echo url("Role/admin_add"); ?>","1","800","500")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick='admin_del(this,"<?php echo $vo['admin_id']; ?>")' class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			data: {
				id:id
			},
			url: "<?php echo url('Role/delete'); ?>",
			dataType: 'json',
			success: function(data){
				if (data.code == 1){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else{
					layer.msg('失败!',{icon:1,time:1000});
				}
				
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	console.log(obj);
	layer.confirm('确认要停用吗？',function(index){
			// $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
			// 		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
			// 		$(obj).remove();
			// 		layer.msg('已停用!',{icon: 5,time:1000});
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
			type: 'POST',
			data: {
				id:id,
				type:0
			},
			url: "<?php echo url('Role/status'); ?>",
			dataType: 'json',
			success: function(res){
				console.log(res)
				if (res.code ==1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+res.id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 5,time:1000});
				}else{
					layer.msg('失败!',{icon: 5,time:1000});
				}
			}
		})
		
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		$.ajax({
			type: 'POST',
			data: {
				id:id,
				type:1
			},
			url: "<?php echo url('Role/status'); ?>",
			dataType: 'json',
			success: function(res){
				if (res.code ==1){
				$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+res.id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!', {icon: 6,time:1000});
				}else{
				layer.msg('失败!', {icon: 6,time:1000});
				}
			}
		)}
	
	
	});
}
</script>
</body>
</html>