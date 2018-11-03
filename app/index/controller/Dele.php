<?php
/**
 * @author shou <[<291969317@qq.com>]>
 * @time 2018-11-2
 * 用于开发模块
 */
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;
class Dele extends HomeBase
{
	public function devel()
	{
		return $this->fetch();
	}

}