<?php
/**
 * @author shou 291969317@qq.com
 *  @param  管理员列表与修改  
 *  @param 权限 $[name] [<description>] 
 */
namespace app\admin\controller;
use think\Db;
use app\common\controller\AdminBase;


class Role extends AdminBase
{
	//管理员列表
    public function adminlist()
    {
    	$user = Db::name('admin')->order('create_time desc')->select();
        $db = Db::name('auth_group');
        foreach ($user as $key => &$value) {
            $value['jue'] = $db->where('id',$value['group_id'])->value('title');
        }
        unset($value);
    	$count = count($user); 
    	$this->assign('count',$count);
    	$this->assign('user',$user);
    	return $this->fetch();
    }

    //角色管理
    public function rolelist()
    {
        $auth = Db::name('auth_group')->order('id asc')->select();
    	$this->assign('auth',$auth);
        return $this->fetch();
    }
    //添加角色  所管理的权限
    public function role_add(){
        return $this->fetch();
    }


    //权限管理
    public function role()
    {
        return $this->fetch();
    }

    //添加管理员
    public function admin_add()
    {
    	$admin = Db::name('admin');
    	// $adminid = input('get.');
    	// dump($adminid);die;
    	// if ($adminid){
    	//  	$user = $admin->where('admin_id',$adminid)->find();
    	//  	$this->assign('user',$user);
    	// }
    	if (request()->isPost()) {
    		$data = input('post.');
    		//判断
    		if($admin->where('user_name',$data['adminName'])->find()){
    			return ['code'=>2,'error'=>'用户名已经存在'];
    		}
    		if ($data['password'] != $data['password2']){
    			return ['code'=>2,'error'=>'两次密码不正确'];
    		}
    		$res['user_name'] = $data['adminName'];
    		$res['telephone'] = $data['phone'];
    		$res['email'] = $data['email'];
    		$res['group_id'] = $data['adminRole'];
    		$res['create_time'] = time();
    		$res['status'] = 1;
    		$res['passwd'] = think_ucenter_encrypt($data['password'],config('PWD_KEY'));
    		$admin_id = $admin->insert($res,false,true);	
    		if($admin_id){
				Db::name('auth_group_access')->insert(['uid'=>$admin_id,'group_id'=>$res['group_id']],false,true);
				storage_user_action(UID,session('user_auth.username'),config('BACKEND_USER'),'新增了系统用户');
				return ['code'=>1,'success'=>'新增成功','action'=>'add'];
			}else{
				return ['code'=>2,'error'=>'新增失败'];
			}
    	}
    	return $this->fetch('adminadd');
    }
//删除
    public function delete(){
    	if (request()->isPost())
    	{
    		$id = input('post.id');
    		$w = Db::name('admin')->where('admin_id',$id)->delete();
    		if ($w){
    			return ['code'=>1,'success'=>'删除成功'];
    		}else{
    			return ['code'=>2,'error'=>'删除失败'];
    		}
    	}
    }
    //启用停用 type 1启用 0停用
    public function status()
    {
    	if (request()->isPost())
    	{
    		$id = input('post.id');
    		$type = input('post.type');
    		if ($type == 1){
    			 $data = 1; 
    		}elseif ($type ==0){
    			$data = 0;
    		}
    	  	$w = Db::name('admin')->where('admin_id',$id)->setField('status',$data);
    		if ($w){
    			return ['code'=>1,'id'=>$id];
    		}else{
    			return ['code'=>2];
    		}
    	}
    } 
}
