<?php

namespace app\admin\controller;
use think\Db;
use app\common\controller\AdminBase;

class Index extends AdminBase
{
    public function index()
    {
     	return $this->fetch();   
    }

    public function info()
    {
    	return $this->fetch();
    }
}
