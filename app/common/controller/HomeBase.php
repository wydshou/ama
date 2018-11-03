<?php
/**
 *
 * @author    shou
 *会员中心
 */
namespace app\common\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Paginator;
class HomeBase extends Base{	
	
	protected function _initialize() {
		parent::_initialize();		
		define('UID',wyd_service('index','user')->is_login());
		$this->get_menu();
		if (!UID) {
			$this->redirect('cate/login');
		}
		//当前控制器
		 $controller = Request::instance()->controller();
		 
		 $this->assign('controller',$controller);
			//权限判断  
       	if (session('member_user_auth.group_id') != 0) {//超级管理员不需要验证        
	        $aid = session('member_user_auth.aid');
			$auth = new \user\User();

			// dump($auth->check(request()->module().'/'.to_under_score(request()->controller()).'/'.request()->action(), session('member_user_auth.uid'), $aid));die; 
			if (!$auth->check(request()->module().'/'.to_under_score(request()->controller()).'/'.request()->action(), session('member_user_auth.uid'), $aid)) {
								
				$this->error('没有权限！');
			}
		}

		// 统一 AdminBase 跳转模板
		// config('dispatch_error_tmpl',APP_PATH.'common/view/public/error.tpl');
		// config('dispatch_success_tmpl',APP_PATH.'common/view/public/success.tpl');

		}	

		//获取栏位
	public function get_menu()
	{
		// 是否是超级管理员
		if (session('member_user_auth.group_id') != 0) {
			$aid = session('member_user_auth.aid');
			$this->assign('home_menu',$this->get_auth_menu($aid));
		}else{
			
			$this->assign('home_menu',$this->get_admin_menu());
		}
	}
	//超级管理员栏目
	public function get_admin_menu()
	{
		//后台栏目
		$menu = Db::query('select * from '.config('database.prefix')."home_menu where type='nav' and status = 1 order by sort_order desc");
		$parent = list_to_tree($menu,'id','pid','children',0);
		return $parent;
	}

		//权限用户栏目
	public function get_auth_menu($aid){

		$menu=Db::query('select m.* from '.config('database.prefix').'home_rule ar,'.config('database.prefix')."home_menu m where m.id=ar.menu_id and m.type='nav' and ar.member_id = {$aid} and m.status=1 and ar.group_id=".session('member_user_auth.group_id').' order by m.sort_order');

		$parent_menu=list_to_tree($menu,'id','pid','children',0);
		return $parent_menu;
	}
}
