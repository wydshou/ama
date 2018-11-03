<?php
/**
 * @author shou <[<291969317@qq.com>]>
 * @param 登录检测 $[name] [<description>]
 */
namespace app\index\service;
use think\Db;
//用户数据
class User{
	 
	function is_login(){
				
		$user=('session'==config('member_login_type'))?session('member_user_auth'):cookie('member_user_auth');
		$user_auth_sign=('session'==config('member_login_type'))?session('member_user_auth_sign'):cookie('member_user_auth_sign');		

	    if (empty($user)) {
	        return 0;
	    } else {
	        return $user_auth_sign == data_auth_sign($user) ? $user['uid'] : 0;
	    }
		
	}
	function logout(){
		session('member_user_auth',null);
	}
}