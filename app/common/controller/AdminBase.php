<?php
/**
 * 	@param  shou
 * 	@param 继承类  主要用于判断是否登录 加入缓存 存储配置信息          
 */
namespace app\common\controller;
use \think\Db;
use think\Controller;

class AdminBase extends Base
{	
	protected $user;
	//
	protected function _initialize()
	{
		parent::_initialize();
		define('UID',wyd_service('admin','user')->is_login());
		$this->get_menu();
		if (!UID) {
			$this->redirect('admin/login/login');
		}
 
		//统一 AdminBase 跳转模板
		// config('dispatch_error_tmpl',APP_PATH.'common/view/public/error.tpl');
		// config('dispatch_success_tmpl',APP_PATH.'common/view/public/success.tpl');

	}
	//获取栏位
	public function get_menu()
	{
		if(session('user_auth.username')!=config('administrator')){
			$this->assign('admin_menu',$this->get_auth_menu());
		}else{
			$this->assign('admin_menu',$this->get_admin_menu());
		}
	}
	//超级管理员栏目
	public function get_admin_menu()
	{
		//后台栏目
		$menu = Db::query('select * from '.config('database.prefix')."menu where type='nav' and status = 1 order by sort_order");
		$parent = list_to_tree($menu,'id','pid','children',0);
		return $parent;
	}

	//权限用户栏目
	// public function get_auth_menu(){

	// 	$menu=Db::query('select m.* from '.config('database.prefix').'auth_rule ar,'.config('database.prefix')."menu m where m.id=ar.menu_id and m.type='nav' and m.status=1 and ar.group_id=".session('user_auth.group_id').' order by m.sort_order');

	// 	$parent_menu=list_to_tree($menu,'id','pid','children',0);

	// 	return $parent_menu;
	// }
} 