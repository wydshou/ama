<?php
/**
 * @author    shou
 *
 * 用户注册验证
 */ 
namespace app\common\validate;
use think\Validate;
class Home_member extends Validate
{
    protected $rule = [
        'user_name'  =>  'require|min:2|unique:member',
        'password'=>'require|min:6',
        'email'  =>  'unique:member',
    ];

    protected $message = [
        'user_name.require'  =>  '用户名必填',
        'user_name.min'  =>  '用户名不能小于两个字',     
        'user_name.unique'  =>  '用户名已经存在',
        
        'password.require'  =>  '密码必填',
        'password.min'  =>  '密码不能小于6位',     
            
        'email.unique'  =>  '邮箱已经存在',
       
    ];
    
    protected $scene = [
        'edit'  =>  ['password','email'],
    ];
    
}
?>