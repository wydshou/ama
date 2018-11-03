<?php
/**
 * @author shou <[<291969317@qq.com>]>
 * @time 2018-11-2
 * 用于销售模块
 */
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;
class Sale extends HomeBase
{
	public function sale()
	{
		return $this->fetch();
	}

}