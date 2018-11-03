<?php
/**
 * 注册 登录 相关
 * @author shou <[<291969317@qq.com>]>
 */
namespace app\index\controller;
use app\common\controller\Base;
use think\Db;
use app\common\validate\Member;
/**
 * 
 */
class Cate extends Base
{
	//注册
	public function cate()
	{
		if(request()->isPost()){
			$res = input('post.');
			$validate=new Member();
			if(!$validate->check($res)){				
			    return ['error'=>$validate->getError()];				
			}	
			$member['user_name']=$res['user_name'];
			$member['passwd']=think_ucenter_encrypt($res['password'],config('PWD_KEY'));
			$member['email']=$res['email'];
			$member['create_time']=time();
			$member['status'] = 0;
			$rand_num=rand(100000,999999);
			$rand_num .= time();
			$member['email_code'] = base64_encode(($rand_num.config('PWD_KEY')));
			if(1==config('reg_check')){//是否需要邮箱激活 
				$member['checked']=0;
			}else{
				$member['checked']=1;
			}

			$uid=Db::name('member')->insert($member,false,true);
			if($uid){
				//写入用户权限表
				// Db::name('member_auth_group_access')->insert(['uid'=>$uid,'group_id'=>$member['groupid']],false,true);		
				if(1==config('reg_check')){//需要审核
					$pass = "请点击验证码激活账号";
					$pass.= '<a href="http://www.ymx.com/index/Cate/cates?code='.$member['email_code'].'">'.'去激活'.'</a>';
					 $succ = think_send_mail($member['email'],$rand_num,'激活账号',$pass);
					 if ($succ){
					 	return ['success'=>'注册成功，请去邮箱激活','check'=>1];
					 }else{
					 	Db::name('member')->where('uid',$uid)->delete();
					 	return ['success'=>'邮箱发送失败','check'=>1];
					 }
					 
				}else{//不需要审核
					$auth = array(
		            'uid'             => $uid,
		            'username'        => $member['user_name'],
		            'group_id'		  => config('GROUP'),  //注册会员 默认超级管理员
					 );	
					 
					$this->refresh_member($auth);
					
					// storage_user_action($uid,$member['username'],config('FRONTEND_USER'),'注册成为会员');
					
					return ['success'=>'注册成功','check'=>0];
				}
			}else{
				return ['error'=>'注册失败'];
			}


		}
		return $this->fetch();
	}	
	//邮箱激活
	public function cates(){
		$code = input('get.code');
		$m = Db::name('member')->where('email_code',$code)->update(['checked'=>1,'status'=>1]);		
		if ($m){
			$this->success('激活成功','Cate/login');
		}else{
			$this->error('激活失败','Cate/cate');
		}
	}
	//保存会员信息
	private function refresh_member($auth){
		
		if(empty($auth)&&!is_array($auth)){
			return;	
		}
		
		if('session'==config('member_login_type')){
		 	session('member_user_auth', $auth);
			session('member_user_auth_sign',data_auth_sign($auth));
		 }elseif('cookie'==config('member_login_type')){		
		 	cookie('member_user_auth',$auth,3600*7);
			cookie('member_user_auth_sign',data_auth_sign($auth),3600*7);
		 }
	}
	//登录
	public function login()
	{	
		if(request()->isPost()){
			$data=input('post.');	
			$r=$this->validate_login($data);
			
			if(isset($r['error'])){
				return $r;
			}elseif($r['success']){
				return ['success'=>true];
			}
		}
		if(wyd_service('index','user')->is_login()){
			die('您已经登录了账号！！');
		}
		return $this->fetch();
	}

	//verify
	public function verify(){	 	 
		$captcha = new Captcha((array)Config('captcha'));
		return $captcha->entry(1);	 	
    }

	//登录验证
	public function validate_login($data){
		
			if(empty($data['user_name'])){
				return ['error'=>'用户名必填'];
			}elseif(empty($data['password'])){
				return ['error'=>'密码必填'];
			}
			$user=Db::name('member')->where('user_name',$data['user_name'])->find();
			
			if(!$user){
				return ['error'=>'账号不存在！！'];
			}elseif(($user['checked']==0)&&(1==config('reg_check'))){//需要审核
				return ['error'=>'该账号未激活！！'];
			}
			
			if(think_ucenter_encrypt($data['password'],config('PWD_KEY'))==$user['passwd']){
		
				$auth = array(
		            'uid'             => $user['uid'],
		            'username'        => $user['user_name'],
		            'group_id'		  => $user['group_id'],		                     
				 );			
								
				$this->refresh_member($auth);
				
				$login['last_login_time']=time();			
				$login['loginnum']		=	Db::raw('loginnum+1');
				$login['last_login_ip']	=	get_client_ip();
				
				DB::name('member')->where('uid',$user['uid'])->update($login);
				
				storage_user_action($user['uid'],$user['user_name'],config('FRONTEND_USER'),'登录了网站');
				
				return ['success'=>'登录成功'];
			}else{
				return ['error'=>'密码错误'];
			}
	}
	
	//普通管理员登录
		public function logins()
	{	
		if(request()->isPost()){
			$data=input('post.');	
			$r=$this->validate_logins($data);
			
			if(isset($r['error'])){
				return $r;
			}elseif($r['success']){
				return ['success'=>true];
			}
		}
		if(wyd_service('index','user')->is_login()){
			die('您已经登录了账号！！');
		}
		return $this->fetch();
	}

	//登录验证
	public function validate_logins($data){
		
			if(empty($data['user_name'])){
				return ['error'=>'用户名必填'];
			}elseif(empty($data['password'])){
				return ['error'=>'密码必填'];
			}
			$user=Db::name('home_member')->where('user_name',$data['user_name'])->find();
			
			if(!$user){
				return ['error'=>'账号不存在！！'];
			}elseif(($user['status']==0)){//需要审核
				return ['error'=>'该账号已被禁用！！'];
			}
			
			if(think_ucenter_encrypt($data['password'],config('PWD_KEY'))==$user['passwd']){
		
				$auth = array(
		            'uid'             => $user['a_uid'],
		            'username'        => $user['user_name'],
		            'group_id'		  => $user['group_id'],		
		            'aid'			  => $user['aid'],                    
				 );			
								
				$this->refresh_member($auth);
				
				$login['last_login_time']=time();			
				$login['loginnum']		=	Db::raw('loginnum+1');
				$login['last_login_ip']	=	get_client_ip();
				
				DB::name('home_member')->where('a_uid',$user['a_uid'])->update($login);
				
				storage_user_action($user['a_uid'],$user['user_name'],config('FRONTEND_USER'),'登录了网站');
				
				return ['success'=>'登录成功'];
			}else{
				return ['error'=>'密码错误'];
			}
	}

		//注销登录
	public function logout()
	{
		wyd_service('index','user')->logout();		
		$this->redirect('Cate/login');
	}
}
