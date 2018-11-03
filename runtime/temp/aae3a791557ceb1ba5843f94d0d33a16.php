<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"E:\WWW\ymx./app/index\view\Home\admini\add.html";i:1540979468;s:42:"E:\WWW\ymx\app\index\view\Public\base.html";i:1541144982;}*/ ?>
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
  
		<div class="content-page">
			<div class="content">
			<div class="card-box">
			<div class="am-g">
				<div class="am-u-md-6">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">添加管理员</h4>
						<form class="am-form am-form-horizontal" action="<?php echo url('Home/add_admin'); ?>" method="post">
							  <div class="am-form-group">
						    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">管理员</label>
						    <div class="am-u-sm-9">
						      <input type="text" id="doc-ipt-3" name="user_name" placeholder="新添管理员名">
						    </div>
						  </div>
						
						  <div class="am-form-group">
						    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">姓名</label>
						    <div class="am-u-sm-9">
						      <input type="text" id="doc-ipt-3" name="true_name" placeholder="新添加姓名">
						    </div>
						  </div>
						
						  <div class="am-form-group">
						    <label for="doc-ipt-pwd-2" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">密码</label>
						    <div class="am-u-sm-9">
						      <input type="password" id="doc-ipt-pwd-2" name="passwd" placeholder="设置一个新密码吧">
						    </div>
						  </div>
						  
						  <div class="am-form-group">
						    <label for="doc-ipt-pwd-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">确认新密码</label>
						    <div class="am-u-sm-9">
						      <input type="password" id="doc-ipt-pwd-3" name="passwd2" placeholder="输入确认新密码">
						    </div>
						  </div>
						
				  <div class="am-form-group">
						    <label for="doc-ipt-pwd-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">邮箱</label>
						    <div class="am-u-sm-9">
						      <input type="email" id="doc-ipt-pwd-3" name="email" placeholder="输入邮箱">
						    </div>
						  </div>
						  
						  	<div class="am-form-group">
						    <label for="doc-ipt-pwd-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">手机</label>
						    <div class="am-u-sm-9">
						      <input type="text" id="doc-ipt-pwd-3" name="phone" placeholder="输入手机">
						    </div>
						  </div>

				<div class="am-form-group">
					 <label for="doc-ipt-pwd-3" class="am-u-sm-3 am-form-label am-text-right am-padding-right-0">所属角色</label>
					<div class="am-u-sm-9">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="group_id">
						<?php if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $g['id']; ?>"><?php echo $g['title']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						</span>
					</div>
					<div class="col-3">
					</div>
				</div>
				  <div class="check-tips" style="color:red;padding-left: 10px; text-align: center;"></div>
						  <div class="am-form-group">
						    <div class="am-u-sm-10 am-u-sm-offset-3">
						    	 <button type="submit" class="am-btn am-btn-primary">提交</button>
						    </div>
							  </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		      $("form").submit(function(){
		        var self = $(this);
		        $.post(self.attr("action"), self.serialize(), success, "json");
		        return false;

		        function success(data){
		        	console.log(data)
		        	if (data.error){
		        		self.find(".check-tips").text(data.error);
		        	}else if(data.success){
		        		  layer.msg('添加成功!',{icon:1,time:1000});
		        		  window.location.href = "<?php echo url('home/adminlist'); ?>";
		        	}
		        }
		      });
		</script>

