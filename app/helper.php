<?php
/**
 * @author shou 291969317@qq.com
 * @param 助手函数 $[name] [<description>]
 */

use think\exception\ClassNotFoundException;
if (!function_exists('osc_service')) {
    /**
     * osc service助手函数
     * 
     */
    function wyd_service($module_name,$service_name)
    {
        $class = '\\app\\'.$module_name.'\\service\\' . ucwords($service_name); 
        
        if (class_exists($class)) {
               return new $class();
        } else {
                throw new ClassNotFoundException('class not exists:' . $class, $class);
        }
    }
}