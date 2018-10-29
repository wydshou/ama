<?php
/**
 * @author shou <[<email address>]>
 * @param 后台验证 $[name] [<description>]
 */
namespace app\common\validate;
use think\Validate;
class Member extends Validate
{
    protected $rule = [
        'adminName'  =>  'require|min:2|unique:member',
        'password'=>'require|min:6',
        'passwoed2'=>'require|confirm:password'    
    ];

    protected $message = [
        'adminName.require'  =>  '用户名必填',
        'adminName.min'  =>  '用户名不能小于两个字',     
        'adminName.unique'  =>  '用户名已经存在',
        
		'password.require'  =>  '密码必填',
		'password.min'  =>  '密码不能小于6位',  
		'passwoed2.require'  =>  '确认密码必填',
		'passwoed2.confirm'  =>  '两次密码不一样'
		
    ];
	
}