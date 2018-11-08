<?php
return [	
		'LAYOUT_ON'=>true,
		'LAYOUT_NAME'=>'home_layout',
	  	// 配置邮件发送服务器
    	'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称，这里用的是新浪邮箱，qq: smtp.qq.com , 163:smtp.163.com
	    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
	    'MAIL_USERNAME' =>'chenlilin99@163.com',//发件人邮箱名，注意换成你注册的新浪邮箱地址
	    'MAIL_FROM' =>'chenlilin99@163.com',//发件人邮箱地址，注意换成你注册的新浪邮箱地址
	    'MAIL_FROMNAME'=>'ITOMTE INC and technology',//发件人姓名
	    'MAIL_PASSWORD' =>'mx163800680',//密码，请填上发件人邮箱密码
	    // mx163800680 chenlilin99    ww184123
	    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
	    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件


];
