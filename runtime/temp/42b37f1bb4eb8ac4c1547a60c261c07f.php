<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:41:"E:\WWW\ymx./app/index\view\cate\cate.html";i:1540950597;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>	
		<link rel="stylesheet" href="/public/Home/assets/css/core.css" />
		<link rel="stylesheet" href="/public/Home/assets/css/menu.css" />
		<link rel="stylesheet" href="/public/Home/assets/css/amazeui.css" />
		<link rel="stylesheet" href="/public/Home/assets/css/component.css" />
		<link rel="stylesheet" href="/public/Home/assets/css/page/form.css" />


		<script type="text/javascript" src="/public/Home/assets/js/jquery-2.1.0.js" ></script>
		<script type="text/javascript" src="/public/Home/assets/js/amazeui.min.js"></script>
		<script type="text/javascript" src="/public/Home/assets/js/app.js" ></script>
		<script type="text/javascript" src="/public/Home/assets/js/blockUI.js" ></script>
	</head>
	<body>
		<div class="account-pages">
			<div class="wrapper-page">
				<div class="text-center">
	                <a href="index.html" class="logo"><span>创建账号<span></span></span></a>
	            </div>
	 
	            <div class="m-t-40 card-box">
	            	<div class="text-center">
	                    <h4 class="text-uppercase font-bold m-b-0"></h4>
	                </div>
	                <div class="panel-body">
	             <form class="am-form" action="<?php echo url('Cate/cate'); ?>" method="post">
	                		<div class="am-g">
	                			<div class="am-form-group">
							      <input type="text" class="am-radius" name="user_name" placeholder="用户名">
							    </div>
						<div class="am-form-group">
							      <input type="email" class="am-radius" name="email"  placeholder="验证邮箱">
						</div>
			    	<div class="am-form-group form-horizontal m-t-20">
						 <input type="password" class="am-radius" name="password"  placeholder="请输入密码">
					</div>

					<div class="am-form-group form-horizontal m-t-20">
					   <input type="password" class="am-radius" name="password2"  placeholder="请再次输入密码">
							    </div>
							   <div class="check-tips" style="color:red;"></div>
		                        <div class="am-form-group ">
		                        	<button type="button" class="am-btn am-btn-primary am-radius" id="submits" style="width: 100%;height: 100%;">注 册</button>
		                        	 <!-- <input name="" type="submit" class="am-btn am-btn-primary am-radius" id="succes" value="注 册" style="width: 100%;height: 100%;"> -->
		                        </div>
		                        
		                        <div class="am-form-group ">
		                        <a href="login.html" class="text-muted"><i class="fa fa-lock m-r-5"></i>进入登录页面</a>
		                        </div>
	                		</div>
	                	</form>
	                </div>
	            </div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$("#submits").click(function(){
		var username=$("input[name='user_name']").val();
		var pwd=$("input[name='password']").val();
		var pwd2=$("input[name='password2']").val();
		var remail=$("input[name='email']").val();
		if(username==''){
			$(".check-tips").text('请填写用户名');
			return false;
		}else if(pwd==''){
			$(".check-tips").text('请填写密码');
			return false;
		}else if(pwd2==''){
			$(".check-tips").text('请输入确认密码');
			return false;
		}else if(pwd2!=pwd){
			$(".check-tips").text('两次密码不一致');
			return false;
		}else if(remail==''){
			$(".check-tips").text('请填写邮箱');
			return false;
		}

	$.post(
			"<?php echo url('Cate/cate'); ?>",
			{
				user_name:username,
				password:pwd,
				password2:pwd2,	
				email:remail,
			},
			function(d){
				if(d.error){
					alert(d.error);
				}else if(d.success){	
					
					if(d.check==1){
						alert(d.success);
					}else if(d.check==0){
						
						// var p=$("#top",window.parent.document).find('ul');						
						// p.html('');					
						// p.append('<li><a href="<?php echo url('member/order_member/index'); ?>">会员中心</a></li><li><a href="<?php echo url('/logout'); ?>">退出</a></li>');								
					}
					// parent.window.art.dialog.list['reg'].close();	
				}
			}	
		);
	});
</script>
