<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:44:"E:\WWW\ymx./app/index\view\home\addrole.html";i:1541041863;s:42:"E:\WWW\ymx\app\index\view\Public\base.html";i:1541144982;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>超级管理员</title>
    <link rel="stylesheet" href="/public/Home/assets/css/amazeui.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/core.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/menu.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/index.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/admin.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/page/typography.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/page/form.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/component.css" />
    <script type="text/javascript" src="/public/Home/assets/js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/amazeui.min.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/app.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/blockUI.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/charts/echarts.min.js"></script>
    <!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/public/static/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/public/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/public/static/lib/laypage/1.2/laypage.js"></script>


<script type="text/javascript" src="/public/static/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/public/static/static/h-ui/js/H-ui.min.js"></script>  -->
<!-- <script type="text/javascript" src="/public/static/static/h-ui.admin/js/H-ui.admin.js"></script> /_footer 作为公共模版分离出去 -->
</head>

    <!-- Begin page -->
    <header class="am-topbar am-topbar-fixed-top">

        <div class="am-topbar-left am-hide-sm-only">
            <a href="index.html" class="logo"><span>admin<span></span></span><i class="zmdi zmdi-layers"></i></a> 
        </div>

        <div class="contain">
                <ul class="am-nav am-navbar-nav am-navbar-left">
                    <li style=" float:left;"><h4 class="page-title"></h4></li>

            <?php if(is_array($home_menu) || $home_menu instanceof \think\Collection || $home_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $home_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
                    <li style=" float:left;"><h4 class="page-title"><a  href="<?php echo url($m['url']); ?>"><?php echo $m['title']; ?></a></h4></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                
                </ul>
            <ul class="am-nav am-navbar-nav am-navbar-right">
                <!--<li class="inform" ><i class="am-icon-bell-o" aria-hidden="true"></i></li> -->
                <li class="hidden-xs am-hide-sm-only">
                    <a href="form_basic.html"></a>
                </li>
                <li class="hidden-xs am-hide-sm-only"><a href="">账号设置</a> 
                </li>
                <li class="hidden-xs am-hide-sm-only"><a href="<?php echo url('Cate/logout'); ?>"> 安全退出  </a> 
                </li>
            </ul>
        </div>

    </header>

 <div class="admin">
    <!-- l栏目 -->
         <div class="admin-sidebar am-offcanvas  am-padding-0" id="admin-offcanvas">
            <div class="am-offcanvas-bar admin-offcanvas-bar">
                <!-- User -->
                <div class="user-box am-hide-sm-only">
                    <div class="user-img">
                        <img src="/public/Home/assets/img/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                        <div class="user-status offline"><i class="am-icon-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <h5><a href="html/form_validate.html"><?php echo session('member_user_auth.username'); ?></a> </h5>
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="am-icon-cog" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-custom">
                                <i class="am-icon-cog" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->
                <ul class="am-list admin-sidebar-list">
                    <li><a href="index.html"><span class="am-icon-home"></span> 首页</a>
                    </li>
            <?php if(is_array($home_menu) || $home_menu instanceof \think\Collection || $home_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $home_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['children'])): if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $k=>$v): if($v['module'] == $controller): ?>
                    <li class="admin-parent">
                        <a class="am-cf" data-am-collapse="{target: '#collapse-nav<?php echo $k;?>'}"><span class="<?php echo $v['icon']; ?>"></span> <?php echo $v['title']; ?> <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                        <ul class="am-list am-collapse admin-sidebar-sub am-in" id='collapse-nav<?php echo $k;?>'>
                        <?php if(isset($v['children'])): if(is_array($v['children']) || $v['children'] instanceof \think\Collection || $v['children'] instanceof \think\Paginator): if( count($v['children'])==0 ) : echo "" ;else: foreach($v['children'] as $key=>$vv): ?>
                            <li><a href="<?php echo url($vv['url']); ?>" class="am-cf"><span><?php echo $vv['title']; ?></span></a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </ul>
                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?> 
                </ul>
        </div>
</div>
  
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/public/static/static/h-ui.admin/css/style.css" />
<!-- <style type="text/css">
	.permission-list > dd > dl > dt {
		float: none;
	}
</style> -->

	<div class="content-page">
			<!-- Start content -->
			<div class="content">
			<div class="card-box">
			<!-- row start -->
			<div class="am-g">
				<div class="am-u-md-8">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">添加角色</h4>
				<form class="am-form am-form-horizontal" method="post" action="<?php echo url('Home/addrole'); ?>">
				  <div class="am-form-group">
			    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">角色名</label>
			    <div class="am-u-sm-9">
			      <input type="text" id="doc-ipt-3" name="roleName" placeholder="新添加角色名">
			    </div>
			  </div>
			 	 <div class="am-form-group">
			    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">角色描述</label>
			    <div class="am-u-sm-9">
			      <input type="text" id="doc-ipt-3" name="roledesc" placeholder="角色描述">
			    </div>
			  </div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">网站角色：</label>
			<div class="formControls col-xs-8 col-sm-9">
		<?php if(is_array($access_menu) || $access_menu instanceof \think\Collection || $access_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $access_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?>
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="<?php echo $node['id'] ?>" class="auth_rules" name="rules[]" id="user-Character-0">
							<?php echo $node['title']; ?></label>
					</dt>
					<dd>
						<!-- 二级 -->
			<?php if(isset($node['child'])): if(is_array($node['child']) || $node['child'] instanceof \think\Collection || $node['child'] instanceof \think\Paginator): if( count($node['child'])==0 ) : echo "" ;else: foreach($node['child'] as $key=>$op): ?>
						<dl class="cl permission-list2">
							<dt>
								<label class="" <?php if(!(empty($child['tip']) || (($child['tip'] instanceof \think\Collection || $child['tip'] instanceof \think\Paginator ) && $child['tip']->isEmpty()))): ?> title='<?php echo $child['tip']; ?>'<?php endif; ?>>
									<input type="checkbox" name="rules[]" class="auth_rules" value="<?php echo $op['id'] ?>" id="user-Character-0-0">
									<?php echo $op['title']; ?></label>
							</dt>
							<dd>
							<?php if(!(empty($op['child']) || (($op['child'] instanceof \think\Collection || $op['child'] instanceof \think\Paginator ) && $op['child']->isEmpty()))): if(is_array($op['child']) || $op['child'] instanceof \think\Collection || $op['child'] instanceof \think\Paginator): if( count($op['child'])==0 ) : echo "" ;else: foreach($op['child'] as $key=>$vvv): ?>	
								<label class="">
									<input type="checkbox" name="rules[]" class="auth_rules"  value="<?php echo $vvv['id'] ?>" id="user-Character-0-0-0">
									<?php echo $vvv['title']; ?></label>
								<?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</dd>
						</dl>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</dd>
				</dl>
		<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	<!-- <?php if(is_array($access_menu) || $access_menu instanceof \think\Collection || $access_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $access_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?>
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="" name="user-Character-0" id="user-Character-0">
							<?php echo $node['title']; ?></label>
					</dt>
					<dd>
					
			<?php if(isset($node['child'])): if(is_array($node['child']) || $node['child'] instanceof \think\Collection || $node['child'] instanceof \think\Paginator): if( count($node['child'])==0 ) : echo "" ;else: foreach($node['child'] as $key=>$op): ?>
						<dl class="cl permission-list2">
							<dt>
								<label class="">
									<input type="checkbox" value="" name="user-Character-0-0" id="user-Character-0-0">
									<?php echo $op['title']; ?></label>
							</dt>
					<?php if(!(empty($op['child']) || (($op['child'] instanceof \think\Collection || $op['child'] instanceof \think\Paginator ) && $op['child']->isEmpty()))): if(is_array($op['child']) || $op['child'] instanceof \think\Collection || $op['child'] instanceof \think\Paginator): if( count($op['child'])==0 ) : echo "" ;else: foreach($op['child'] as $key=>$child): ?>
						<dt style="padding-left: 10px;display: block;">
								<label class="">
									<input type="checkbox" value="" name="user-Character-0-0" id="user-Character-0-0">
									<?php echo $child['title']; ?></label>
						</dt>
					
							<dd>
							<?php if(!(empty($child['child']) || (($child['child'] instanceof \think\Collection || $child['child'] instanceof \think\Paginator ) && $child['child']->isEmpty()))): if(is_array($child['child']) || $child['child'] instanceof \think\Collection || $child['child'] instanceof \think\Paginator): if( count($child['child'])==0 ) : echo "" ;else: foreach($child['child'] as $key=>$vvv): ?>	
								<label class="">
									<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-0">
									<?php echo $vvv['title']; ?></label>
								<?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</dd>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</dl>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</dd>
				</dl>
		<?php endforeach; endif; else: echo "" ;endif; ?> -->
						  </div>
						  <div class="am-form-group">
						    <div class="am-u-sm-10 am-u-sm-offset-3">
						    	 <button type="submit" class="am-btn am-btn-primary">保存</button>
						     	 <button type="submit" class="am-btn am-btn-primary">关闭</button>
						    </div>
						  </div>
				</form>
						
					</div>
				</div>
			</div>
			</div>
		</div>
<script type="text/javascript">

	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
	
	// $("#form-admin-role-add").validate({
	// 	rules:{
	// 		roleName:{
	// 			required:true,
	// 		},
	// 	},
	// 	onkeyup:false,
	// 	focusCleanup:true,
	// 	success:"valid",
	// 	submitHandler:function(form){
	// 		$(form).ajaxSubmit();
	// 		var index = parent.layer.getFrameIndex(window.name);
	// 		parent.layer.close(index);
	// 	}
	// });

</script>


