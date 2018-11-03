<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"E:\WWW\ymx./app/index\view\home\index.html";i:1541125511;s:42:"E:\WWW\ymx\app\index\view\Public\base.html";i:1541144982;}*/ ?>
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
  
    <!-- sidebar end -->

<body>

     <!-- <script type="text/javascript" src="/public/Home/assets/js/charts/echarts.min.js"></script> -->
        <div class="content-page">
            <div class="content">
                <div class="card-box">
                    <div class="am-g">
                        <div class="am-u-sm-8">
                            <div class="card-box" style="height: 360px;">
                                <h4 class="m-t-0 m-b-5 font-600" style="font-size: 16px;">今日财务</h4>

                                <table style="width:800px; font-size: 13px;">

                                    <tr style="border-bottom: 1px solid #f3f3f3; font-weight:600;height: 50px;">
                                        <td>销售额</td>
                                        <td>订单量</td>
                                        <td>销量</td>
                                        <td>成本</td>
                                        <td>毛利润</td>
                                        <td>毛率</td>
                                    </tr>

                                    <tr style="border-bottom: 1px solid #f3f3f3">
                                        <td><a href="#">753</a>
                                        </td>
                                        <td><a href="#">95</a>
                                        </td>
                                        <td><a href="#">4</a>
                                        </td>
                                        <td><a href="#">95</a>
                                        </td>
                                        <td><a href="#">4</a>
                                        </td>
                                        <td><a href="#">95</a>
                                        </td>
                                    </tr>
                                </table>

                                <!-- col start -->


                                <div id="index-line-11" style="height: 200px;"></div>

                                <!-- col end -->
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="am-u-md-4">
                            <div class="card-box widget-user" style="height: 360px; ">
                                <div>
                                    <h4 class="m-t-0 m-b-5 font-600" style="font-size: 16px;">权限开通（有效日期: 2018-09-27~2018-10-27）</h4>
                                    <div class="m-t-0 m-b-5 font-600"></div>

                                    <div style="padding:20px; margin:20px;">

                                        <br>
                                        <h4 class="m-t-0 m-b-5 font-600" style="padding-left: 15px;"><b>Hi, 13430909089<a href="#" ></a></b></h4> 

                                        <h4 class="m-t-0 m-b-5 font-600" style="padding-left: 15px;">欢迎来到gooo!</h4>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="am-g">
                        <!-- Row start -->


                        <div class="am-u-md-12">
                            <div class="card-box" style="height: 420px;">
                                <h4 class="m-t-0 m-b-30">绑定账号   

								
                    <div class="am-btn-group am-btn-group-xs">
                     <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="index_mjset.html">添加卖家账号</a></button>
            
                  </div>
              </h4> 
                                <div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
                                    <table class="am-table   am-text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>编号</th>
                                                <th>卖家账号昵称</th>
                                                <th>添加日期</th>
                                                <th>账号MWS授权</th>
                                                <th>广告API授权</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>muhchd</td>
                                                <td>2018-5-6</td>
                                                <td>36555315</td>
                                                <td>21444551</td>
                                                <td>
                                                    <div class="am-btn-toolbar">
                                                        <div class="am-btn-group am-btn-group-xs">
                                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="index_mjset.html">编辑卖家账号</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>muhchd</td>
                                                <td>2018-5-6</td>
                                                <td>36555315</td>
                                                <td>21444551</td>
                                                <td>
                                                    <div class="am-btn-toolbar">
                                                        <div class="am-btn-group am-btn-group-xs">
                                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>编辑卖家账号</button>


                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    来自 <a href="#" target="_blank" title="Adminto">Adminto</a>
                </div>
            </div>
        </div>
        <!-- end right Content here -->
        <!--</div>-->
    </div>
    </div>
</body>
    <script type="text/javascript" src="/public/Home/assets/js/charts/index.js"></script>
    <!-- navbar -->
    <a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>

  
