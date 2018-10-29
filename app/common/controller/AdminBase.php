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

		if (!UID) {
			$this->redirect('admin/login/login');
		}

		//统一 AdminBase 跳转模板
		// config('dispatch_error_tmpl',APP_PATH.'common/view/public/error.tpl');
		// config('dispatch_success_tmpl',APP_PATH.'common/view/public/success.tpl');

	}
} 