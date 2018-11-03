<?php

namespace app\admin\controller;
use think\Db;
use app\common\controller\AdminBase;
/**
 * 	@author shou <[<291969317@qq.com>]>
 * 	@param 系统设置 menu设置 [<description>]
 */
class System extends AdminBase
{
	//栏目设置
    public function catelist()
    {
    	$menu = Db::name('menu')->where('type','nav')->where('status',1)->order('sort_order')->select();
    	// dump(list_to_tree($menu,'id','pid','children',0));die;
     	$this->assign('menu',list_to_tree($menu,'id','pid','children',0));	
     	return $this->fetch();   
    }
    //添加栏目 
   public function addcate()
   {	
   		//查出上级分类
   	 	$db= Db::name('menu');
   		$par_menu = $db->where('pid',0)->where('status',1)->order('sort_order desc')->select();
   		$this->assign('par',$par_menu);
   		if (request()->isPost()){
   			$data['pid'] = input('post.sel_Sub');
   			$data['title'] = input('post.catetitle');
   			$data['module'] = input('post.cateadmin');
   			$data['url'] = input('post.cateurl');
   			$data['icon'] = input('post.cateicon');
   			$data['type'] = input('post.catenav');
   			$data['status'] = 1;
   			$succ = $db->insert($data,false,true);
   			if ($succ){
   				return ['code'=>1];
   			}else{
   				return ['code'=>2,'desc'=>'失败'];
   			}
   		}
   		return $this->fetch();
   }

   //前台栏目管理
   public function homelist()
    {
      $homemenu = Db::name('home_menu')->where('type','nav')->where('status',1)->order('sort_order')->select();
      // dump(list_to_tree($menu,'id','pid','children',0));die;
      $this->assign('homemenu',list_to_tree($homemenu,'id','pid','children',0));  
      return $this->fetch();   
    }
   //添加栏目 
   public function addhome()
   {  
      //查出上级分类
      $db= Db::name('home_menu');
      $par_menu = $db->where('status',1)->order('sort_order desc')->select();
      $this->assign('par',$par_menu);
      if (request()->isPost()){
        $data['pid'] = input('post.sel_Sub');
        $data['title'] = input('post.catetitle');
        $data['module'] = input('post.cateadmin');
        $data['url'] = input('post.cateurl');
        $data['icon'] = input('post.cateicon');
        $data['type'] = input('post.catenav');
        $data['status'] = 1;
        $succ = $db->insert($data,false,true);
        if ($succ){
          return ['code'=>1];
        }else{
          return ['code'=>2,'desc'=>'失败'];
        }
      }
      return $this->fetch();
   }
}
