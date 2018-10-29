<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
//设置网站字符集
header("Content-Type:text/html; charset=utf-8");
define('ROOT_PATH',str_replace('\\','/',dirname(__FILE__)) . '/'); 
//图片上传目录
define('DIR_IMAGE',ROOT_PATH.'public/uploads/');
//类库包
define('EXTEND_PATH','./extend/');
//扩展类库包
define('VENDOR_PATH','./vendor/');
// 定义应用目录
define('APP_PATH', __DIR__ . './app/');
// 加载框架引导文件
require __DIR__ . './thinkphp/start.php';
