<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"E:\WWW\ymx./app/index\view\cate\login.html";i:1540978000;}*/ ?>
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
	                <a href="index.html" class="logo"><span>用户登录<span></span></span></a>
	            </div>
	            
	            <div class="m-t-40 card-box">
	            	<div class="text-center">
	                    <h4 class="text-uppercase font-bold m-b-0"></h4>
	                </div>
	                 <div class="panel-body">
	              <form class="am-form" >
	                		<div class="am-g">
	                			<div class="am-form-group">
							      <input type="email" class="am-radius" name="user_name" placeholder="请输入用户名">
							    </div>
							
							    <div class="am-form-group form-horizontal m-t-20">
							      <input type="password" class="am-radius" name="password"  placeholder="请输入密码">
							    </div>
						 <div class="am-form-group ">
		                           	<label style="font-weight: normal;color: #999;">
								        <input type="checkbox" class="remeber"> 记密住码
								    </label>
		                        </div>
		                        
		                        <div class="am-form-group ">
		                        	<button type="button" class="am-btn am-btn-primary am-radius" id="send" style="width: 100%;height: 100%;">登 录</button>
		                        </div>
		                        <div class="am-form-group">
		                        <label><input name="chaoji" type="radio" value="1" />超级管理员 </label>
		                        <label><input name="chaoji" type="radio" value="0" checked="checked" />管理员 </label>
		                   	 </div>
		                        <div class="am-form-group ">
		                        <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i>找回登录密码</a> &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; <a href="login2.html" class="text-muted"><i class="fa fa-lock m-r-5"></i>进入注册页面</a>
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
		$('#send').click(function(){
		var chaoji = $("input[name='chaoji']:checked").val();
		var username=$("input[name='user_name']").val();
		var pwd=$("input[name='password']").val();
		
		if(username==''){
			alert('请输入账号');
			return false;
		}else if(pwd==''){
			alert('请输入密码');
			return false;
		}
		
		if (chaoji == 1){
			var url = "<?php echo url('Cate/login'); ?>"
		}else if(chaoji == 0){
			var url = "<?php echo url('Cate/logins'); ?>"
		}	

		$.post(
			url,
			{
				user_name:username,	
				password :pwd
			},
			function(d){
				if(d.error){
					alert(d.error);
				}else if(d.success){
					alert('登录成功');
					window.location.href="<?php echo url('Index/Home/index'); ?>";	
				}
			}	
		);
		
	});

</script>
