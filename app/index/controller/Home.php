<?php
/**
 * @param 2018-10-31 $[name] [<description>]
 * 展示 首页
 */
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;
use app\index\model\HomeGroup;
use app\common\validate\HomeMember;
class Home extends HomeBase
{
	public function index()
	{
		return $this->fetch();
	}
	// 角色
	public function role()
	{
		if ($this->member()){
			$this->error('没有权限！');
		}
		$data['member_id'] = session('member_user_auth.uid');
		$auth = Db::name('home_group')->where($data)->order('id asc')->paginate(5);
    	$this->assign('auth',$auth);
    	$this->assign('page',$auth->render());
		return $this->fetch();
	}
	//添加角色
	public function addrole()
	{	
		if ($this->member()){
			$this->error('没有权限！');
		}
		//栏目列表
		$menu = DB::name('home_menu')->order('sort_order')->select();
		$this->assign('access_menu',list_to_tree($menu,'id','pid','child',0));
		if (request()->isPost()){
			$data = input('post.');
			//获取栏位列表 
			$model = model('HomeGroup');
			if (empty($data['roleName'])){
				return $this->error('角色名必须');
			}
			if ($model->add($data)){
				return $this->success('添加成功','home/role');
			}else{
				return $this->error('失败');
			}
		}
		return $this->fetch();
	}
	//编辑角色
	public function editrole()
	{
		if ($this->member()){
			$this->error('没有权限！');
		}
		$id = input('id');
		$menu = Db::name('home_menu')->order('sort_order')->select();
		$this->assign('access_menu',list_to_tree($menu,'id','pid','child',0));
		$this->assign('rules',Db::name('home_group')->where(array('id'=>$id))->find());
		if (request()->isPost()){
				$res = input('post.');
				 if (empty($res['roleName'])){
	            	return $this->error('角色名必须');
	            }
	            $r = model('HomeGroup');
      			if ($r->edit($res)){
      				return $this->success('编辑成功',url('Home/role'));
      			}else{
      				return $this->success('失败',url('Home/role'));
      			}
		}
		return $this->fetch();
	}
	//管理员 查询注册用户下的管理员信息
	public function adminlist() 
	{	
		if ($this->member()){
			$this->error('没有权限！');
		}
		$uid = session('member_user_auth.uid');
		$member = Db::name('home_member')->where('aid',$uid)->where('status',1)->paginate(8);
		$page = $member->render();
		$member  = $member ->all();
		// $page = $member->render();
		// dump($page);die;
		$db = Db::name('home_group');
		foreach ($member as $key => &$value) {
			$value['title'] = $db->where('id',$value['group_id'])->value('title');
		}
		unset($value);
		$this->assign('admin',$member);
		$this->assign('page',$page);
		return $this->fetch('Home/admini/adminlist');
	}
	//添加管理员
	public function add_admin()
	{
		if ($this->member()){
			$this->error('没有权限！');
		}
		$uid = session('member_user_auth.uid');
		$group = Db::name('home_group')->where('member_id',$uid)->field('id,title')->order('id asc')->select();
		$this->assign('group',$group);
		if (request()->isPost()){
			$res = input('post.');
		/**
		 * 验证
		 * @var HomeMember
		 */
			$validate=new HomeMember();
			if(!$validate->check($res)){				
			    return ['error'=>$validate->getError()];				
			}	

			$a = model('HomeGroup');
			if ($a->addadmin($res)){
				return ['success'=>'添加成功'];
			}else{
				return ['success'=>'添加失败'];
			}
		}
		return $this->fetch('Home/admini/add');
	}

	//修改管理员权限
	public function adminedit()
	{
		if ($this->member()){
			return $this->error('没有权限！');
		}
		$id = trim(input('id'));
		$uid = session('member_user_auth.uid');
		$group = Db::name('home_member')->where('aid',$uid)->where('a_uid',$id)->field('group_id,a_uid')->find();
		$home_group = Db::name('home_group')->where('member_id',$uid)->field('id,title')->select();
		$this->assign('group',$group);
		$this->assign('home_group',$home_group);
		if (request()->isPost()){	
			  $gid = input('group_id');
			  $aid = input('aid');
			Db::name('home_member')->where('a_uid',$aid)->setField('group_id',$gid);
			storage_user_action(UID,session('member_user_auth.username'),config('BACKEND_USER'),'修改理员权限');
			return ['success'=>'修改成功'];
		}		
		return $this->fetch('Home/admini/edit');
	}
	//修改密码
	public function adminpass()
	{
		if ($this->member()){
			return $this->error('没有权限！');
		}
		$id = input('id');
		$this->assign('aid',$id);
		if (request()->isPost()){
			$aid = input('aid');
			$passwd = input('');

			$validate=new HomeMember();
			if(!$validate->scene('edit')->check($passwd)){				
			    return ['error'=>$validate->getError()];				
			}	
			
			$pass = think_ucenter_encrypt($passwd['passwd'],config('PWD_KEY'));
			Db::name('home_member')->where('a_uid',$aid)->setField('passwd',$pass);
			return ['success'=>'修改成功'];
		}
		return $this->fetch('Home/admini/editpass');
	}
	//删除
	public function dele(){
		if ($this->member()){
			return ['error' => '没有权限！'];
		}
		if (request()->isPost()){
			$id = trim(input('id'));
			if (Db::name('home_member')->where('a_uid',$id)->delete()){
				return ['success'=>'成功'];
			}
			return ['error'=>'失败'];
		}

	}
	//管理员才能访问角色管理以及管理员列表
	private function member(){
		$aid = session('member_user_auth.aid');
		if ($aid){
			return true;
		}
		return false;
	}

	//卖家账号列表
	public function user(){
		   // $city="深圳"; //接收城市名
 
		   //  $url="http://wthrcdn.etouch.cn/weather_mini?city=".$city; 
		   //  $str = file_get_contents($url);  //调用接口获得天气数据
		   //  //这一步很重要
		   //  $result= gzdecode($str);   //解压
		   //  //end
		   //  echo  $result;die;
		return $this->fetch();		
	}
}