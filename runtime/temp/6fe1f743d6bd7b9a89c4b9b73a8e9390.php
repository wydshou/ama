<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"E:\WWW\ymx./app/index\view\Home\admini\adminlist.html";i:1541148101;s:42:"E:\WWW\ymx\app\index\view\Public\base.html";i:1541144982;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>超级管理员</title>
    <link rel="stylesheet" href="/public/Home/assets/css/amazeui.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/core.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/menu.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/index.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/admin.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/page/typography.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/page/form.css" />
    <link rel="stylesheet" href="/public/Home/assets/css/component.css" />
    <script type="text/javascript" src="/public/Home/assets/js/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/amazeui.min.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/app.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/blockUI.js"></script>
    <script type="text/javascript" src="/public/Home/assets/js/charts/echarts.min.js"></script>
    <!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/public/static/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/public/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/public/static/lib/laypage/1.2/laypage.js"></script>


<script type="text/javascript" src="/public/static/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/public/static/static/h-ui/js/H-ui.min.js"></script>  -->
<!-- <script type="text/javascript" src="/public/static/static/h-ui.admin/js/H-ui.admin.js"></script> /_footer 作为公共模版分离出去 -->
</head>

    <!-- Begin page -->
    <header class="am-topbar am-topbar-fixed-top">

        <div class="am-topbar-left am-hide-sm-only">
            <a href="index.html" class="logo"><span>admin<span></span></span><i class="zmdi zmdi-layers"></i></a> 
        </div>

        <div class="contain">
                <ul class="am-nav am-navbar-nav am-navbar-left">
                    <li style=" float:left;"><h4 class="page-title"></h4></li>

            <?php if(is_array($home_menu) || $home_menu instanceof \think\Collection || $home_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $home_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
                    <li style=" float:left;"><h4 class="page-title"><a  href="<?php echo url($m['url']); ?>"><?php echo $m['title']; ?></a></h4></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
                    
                
                </ul>
            <ul class="am-nav am-navbar-nav am-navbar-right">
                <!--<li class="inform" ><i class="am-icon-bell-o" aria-hidden="true"></i></li> -->
                <li class="hidden-xs am-hide-sm-only">
                    <a href="form_basic.html"></a>
                </li>
                <li class="hidden-xs am-hide-sm-only"><a href="">账号设置</a> 
                </li>
                <li class="hidden-xs am-hide-sm-only"><a href="<?php echo url('Cate/logout'); ?>"> 安全退出  </a> 
                </li>
            </ul>
        </div>

    </header>

 <div class="admin">
    <!-- l栏目 -->
         <div class="admin-sidebar am-offcanvas  am-padding-0" id="admin-offcanvas">
            <div class="am-offcanvas-bar admin-offcanvas-bar">
                <!-- User -->
                <div class="user-box am-hide-sm-only">
                    <div class="user-img">
                        <img src="/public/Home/assets/img/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                        <div class="user-status offline"><i class="am-icon-dot-circle-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <h5><a href="html/form_validate.html"><?php echo session('member_user_auth.username'); ?></a> </h5>
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="am-icon-cog" aria-hidden="true"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-custom">
                                <i class="am-icon-cog" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->
                <ul class="am-list admin-sidebar-list">
                    <li><a href="index.html"><span class="am-icon-home"></span> 首页</a>
                    </li>
            <?php if(is_array($home_menu) || $home_menu instanceof \think\Collection || $home_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $home_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['children'])): if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $k=>$v): if($v['module'] == $controller): ?>
                    <li class="admin-parent">
                        <a class="am-cf" data-am-collapse="{target: '#collapse-nav<?php echo $k;?>'}"><span class="<?php echo $v['icon']; ?>"></span> <?php echo $v['title']; ?> <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                        <ul class="am-list am-collapse admin-sidebar-sub am-in" id='collapse-nav<?php echo $k;?>'>
                        <?php if(isset($v['children'])): if(is_array($v['children']) || $v['children'] instanceof \think\Collection || $v['children'] instanceof \think\Paginator): if( count($v['children'])==0 ) : echo "" ;else: foreach($v['children'] as $key=>$vv): ?>
                            <li><a href="<?php echo url($vv['url']); ?>" class="am-cf"><span><?php echo $vv['title']; ?></span></a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </ul>
                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?> 
                </ul>
        </div>
</div>
  
    <div class="content-page"  >
      <!-- Start content -->
      <div class="content">
        <div class="card-box">
  <ul class="am-nav am-navbar-nav">
    <li><h4 class="page-title">管理员列表 <a href="<?php echo url('Home/add_admin'); ?>"><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>添加管理员</button></a></h4></li>
        </ul>
            <!-- Row start -->
  <div class="am-g" style="padding-top: 30px;">
        <div class="am-u-sm-12">
       
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
            <tr>
                <th class="table-set">账户名 </th>
        <!-- <th class="table-set">性别</th> -->
                <th class="table-set">邮箱</th>
                <th class="table-set">手机</th>
                <th class="table-set">修改时间</th>
              <th class="table-set">角色</th>
                <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody> 
        <?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admins): $mod = ($i % 2 );++$i;?>
              <tr>
                <td><?php echo $admins['user_name']; ?></td>
                    <!-- <td class="am-hide-sm-only">154</td> -->
                <td class="am-hide-sm-only"><?php echo $admins['email']; ?></td>
          <td class="am-hide-sm-only"><?php echo $admins['phone']; ?></td>
                <td class="am-hide-sm-only"><?php echo date("Y-m-d",$admins['create_time']); ?></td>
               <td class="am-hide-sm-only"><?php echo $admins['title']; ?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> <a href="<?php echo url('Home/adminpass',['id'=>$admins['a_uid']]); ?>">修改密码</a></button>
                     <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> <a href="<?php echo url('Home/adminedit',['id'=>$admins['a_uid']]); ?>">修改权限</a></button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="deletes(this)" id="<?php echo $admins['a_uid']; ?>"><span class="am-icon-pencil-square-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            </table>
            <div class="am-cf">
              <div class="am-fr">
                <ul class="am-pagination">
                   <?php echo $page; ?>
                </ul>
              </div>
            </div>
            <hr />
            <p>注：.....</p>
         
        </div>
      </div>

          </div>
        </div>
      </div>
      <script type="text/javascript">
        function deletes(v){
            var id = $(v).attr('id');
              layer.confirm('确认要删除吗？',function(v){
                $.ajax({
                  type: 'POST',
                  url: "<?php echo url('Home/dele'); ?>",
                  data:{
                    id:id
                  },
                  dataType: 'json',
                  success: function(data){
                    if (data.error){
                      layer.msg('删除失败!',{icon:1,time:1000});
                    }
                    if (data.success){
                     layer.msg('已删除!',{icon:1,time:1000});
                      window.location.href = "<?php echo url('home/adminlist'); ?>";
                    }
                  },
                });   
              });            
          }
      </script>

