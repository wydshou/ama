<?php
/**
 * @author    shou
 *
 * 管理员添加验证
 */ 
namespace app\common\validate;
use think\Validate;
class HomeMember extends Validate
{
    protected $rule = [
        'user_name'  =>  'require|min:2|unique:home_member',
        'passwd'=>'require|min:6',
        'passwd2'=>'require|confirm:passwd',
        'email' => 'email',
        'email'  =>  'unique:home_member',
    ]; 

    protected $message = [
        'user_name.require'  =>  '管理员必填',
        'user_name.min'  =>  '管理员不能小于两个字',     
        'user_name.unique'  =>  '管理员已经存在',
        
        'passwd.require'  =>  '密码必填',
        'passwd.min'  =>  '密码不能小于6位',     
        'passwd2.require'  =>  '确认密码必填',
        'passwd2.confirm'  =>  '两次密码不一样',

        'email.unique'  =>  '邮箱已经存在',
        'email' => '邮箱格式不对',
    ];
    //验证修改密码
    protected $scene = [
        'edit'  =>  ['passwd','passwd2'],
    ];
}
?>