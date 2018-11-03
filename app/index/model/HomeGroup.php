<?php
/**
 * 模型类
 * @param 用于home控制 添加  修改  等操作 $[name] [<description>]
 * @param return  $[name] [<description>]
 */
namespace app\index\model;

use think\Model;
use think\Db;

class HomeGroup extends Model
{	
	//角色添加
	public function add($data){
				//获取栏位列表 
			if (isset($data['rules'])){
				sort($data['rules']); //重新排列
				$res['rules'] = implode(',', array_unique($data['rules'])); //使用逗号  去掉重复 
			}
			$uid = session('member_user_auth.uid');
			$res['title'] = $data['roleName'];
			$res['status'] = 1;
			$res['description'] = $data['roledesc'];
			$res['member_id'] = $uid;
			$status = HomeGroup::insert($res,false,true);
			if ($status){
				$group_menu = HomeGroup::where('id',$status)->find();
	           	$menu_list=Db::name('home_menu')->select();
				$menu_id = explode(',', $group_menu['rules']);
					foreach ($menu_id as $key => $value) {
						foreach ($menu_list as $k => $values) {
							if($value==$values['id']){
								$m['group_id']=$group_menu['id'];
								$m['menu_id']=$value;					
								$m['name']=!empty($values['url'])?$values['url']:'';
								$m['member_id'] = $uid;
								Db::name('home_rule')->insert($m);
							}		
						}		
					}
				storage_user_action(UID,session('member_user_auth.username'),config('BACKEND_USER'),'新增角色');	
				return true;
			}else{
				return false;
			}
	}
	////编辑角色
	public function edit($res)
	{
			$group_id = (int)$res['group_id'];
			$aid = session('member_user_auth.uid');
			Db::name('home_rule')->where(array('group_id'=>$group_id,'member_id'=>$aid))->delete();
		if(isset($res['rules'])){
	          sort($res['rules']);
	            $data['rules']  = implode( ',' , array_unique($res['rules']));
	           }else{
	           	$data['rules'] = '';
	           }
	            $data['title'] = $res['roleName'];
	          
	          	$data['status'] = 1;
				$data['description'] = $res['roledesc'];

	         if (Db::name('home_group')->where('id',$group_id)->update($data,false,true)){
	           	$group_menu = Db::name('home_group')->where('id',$group_id)->find();
	           	$menu_list=Db::name('home_menu')->select();
				$menu_id = explode(',', $group_menu['rules']);
					foreach ($menu_id as $key => $value) {
						foreach ($menu_list as $k => $values) {
							if($value==$values['id']){
								$m['group_id']=$group_id;
								$m['menu_id']=$value;					
								$m['name']=!empty($values['url'])?$values['url']:'';
								$m['member_id']=session('member_user_auth.uid');
								Db::name('home_rule')->insert($m);
							}		
						}		
					}
		storage_user_action(UID,session('member_user_auth.username'),config('BACKEND_USER'),'编辑了用户权限');	
			return true;
		}else{
			return false;
		}
	}

	//添加管理员
	public function addadmin($res)
	{	
			$db = Db::name('home_member');
			$member = Db::name('member');
			$data['user_name'] = $res['user_name'];
			$data['passwd'] = think_ucenter_encrypt($res['passwd'],config('PWD_KEY'));
			$data['email'] = $res['email'];
			$data['true_name'] = $res['true_name'];
			$data['phone'] = $res['phone'];
			$data['group_id'] = $res['group_id'];
			$data['create_time'] = time();
			$data['status'] = 1;
			$data['aid'] = session('member_user_auth.uid');
			$a_id = $member->where('uid',$data['aid'])->value('a_uid');
				 $aid['a_uid'] = $a_id.'5'.',';
			// return $member->where('uid',$data['aid'])->value('a_uid');
			$user = $db->insert($data,false,true);
			if ($user){
			 	 $a_id = $member->where('uid',$data['aid'])->value('a_uid');
				 $aid['a_uid'] = $a_id.$user.',';
				 $member->where('uid',$data['aid'])->setField('a_uid',$aid['a_uid']);
				 storage_user_action(UID,session('member_user_auth.username'),config('BACKEND_USER'),'添加了管理员');
				return true;
			}else{
				return false;
			}
	}
}