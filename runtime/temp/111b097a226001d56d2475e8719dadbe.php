<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"E:\WWW\ymx./app/admin\view\system\addcate.html";i:1540878386;s:42:"E:\WWW\ymx\app\admin\view\Public\meta.html";i:1540801719;}*/ ?>
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
<title>栏目设置</title>
</head>
<body>
<div class="page-container">
	<form action="<?php echo url('System/addcate'); ?>" method="post" class="form form-horizontal" id="form-category-add">
		<div id="tab-category" class="HuiTab">
			<div class="tabBar cl">
				<span>基本设置</span>
			</div>
			<div class="tabCon">
			<!-- 	<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">栏目ID：</label>
					<div class="formControls col-xs-8 col-sm-9">11230</div>
				</div> -->
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						上级栏目：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="sel_Sub" onchange="SetSubID(this);">
							<option value="0">顶级分类</option>
						<?php if(is_array($par) || $par instanceof \think\Collection || $par instanceof \think\Paginator): $i = 0; $__LIST__ = $par;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $c['id']; ?>"><?php echo $c['title']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">
						<span class="c-red">*</span>
						分类名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="catetitle">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">所属模板：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="cateadmin">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>路径：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="cateurl">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">icon：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="cateicon">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">类型：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" placeholder="" id="" name="catenav">
					</div>
					<div class="col-3">
					</div>
				</div>
			<!-- 	<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">是否启用：</label>
					<div class="formControls col-xs-8 col-sm-9 skin-minimal">
						<div class="check-box">
							<input type="checkbox" id="checkbox-pinglun" name="status">
							<label for="checkbox-pinglun">&nbsp;</label>
						</div>
					</div>
					<div class="col-3">
					</div>
				</div> -->
			</div>
	<!-- 		<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">首页模版：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text" value="" style="width:200px;">
						<input type="button" class="btn btn-default" value="浏览">
					</div>
					<div class="col-3">
					</div>
				</div>
	
		</div> -->
		<div class="row cl">
			<div class="col-9 col-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('form').submit(function(){
		var l = $(this);
		$.post(l.attr("action"), l.serialize(), success, "json");
		return false;
		 function success(data){
		 	if (data.code == 1){
		 		layer.msg('成功!', {icon: 6,time:1000});
		 		window.location.reload()
		 	}else{
		 		 layer.msg('失败!', {icon: 6,time:1000});
		 	}
         
        }
	})


$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#tab-category").Huitab({
		index:0
	});
	// $("#form-category-add").validate({
	// 	rules:{
			
	// 	},
	// 	onkeyup:false,
	// 	focusCleanup:true,
	// 	success:"valid",
	// 	submitHandler:function(form){
	// 		//$(form).ajaxSubmit();
	// 		var index = parent.layer.getFrameIndex(window.name);
	// 		//parent.$('.btn-refresh').click();
	// 		parent.layer.close(index);
	// 	}
	// });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>