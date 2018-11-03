<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"E:\WWW\ymx./app/index\view\dele\devel.html";i:1541127428;s:42:"E:\WWW\ymx\app\index\view\Public\base.html";i:1541144982;}*/ ?>
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





<link href="https://cdn.bootcss.com/element-ui/2.0.5/theme-chalk/index.css" rel="stylesheet">
      
    <div  class="page-dashboard">
          <form class="el-form el-form--inline">
          
            <div  class="el-form-item" style="margin-left:16px;">
              <!---->
              <div class="el-form-item__content">
                <div  class="filter-days-w">
                  <div class="days-w">
                    <div  role="radiogroup" class="el-radio-group">
                      <label  role="radio" tabindex="-1" class="el-radio-button el-radio-button--medium">
                      <input type="radio" tabindex="-1" class="el-radio-button__orig-radio" value="0">
                      <span class="el-radio-button__inner">新品分析
                      <!---->
                      </span></label>
                      <label role="radio" tabindex="0" class="el-radio-button el-radio-button--medium is-active" aria-checked="true">
                      <input type="radio" tabindex="-1" class="el-radio-button__orig-radio" value="1">
                      <span class="el-radio-button__inner">利润报表
                      <!---->
                      </span></label>
                    
                    </div>
                  </div>
                  
                </div>
                <!---->
              </div>
            </div>




            <div  class="el-form-item" style="display: none;">
              <!---->
              <div class="el-form-item__content"><a  href="javascript:;" class="refresh-btn"><i class="el-import-icon-shuaxin"></i></a>
                <!---->
              </div>
            </div>
          </form>
      </div>

					<div class="am-g">
			
						<div class="am-u-sm-12 am-u-md-3">
				          <div class="am-input-group am-input-group-sm">
				            <input type="text" class="am-form-field">
				          <span class="am-input-group-btn">
				            <button class="am-btn am-btn-default" type="button">搜索</button>
				          </span>
				          </div>
				        </div>
				      </div>
					  <!-- Row end -->
					  
					  <!-- Row start -->
					  	<div class="am-g" style="padding-top: 30px;">
        <div class="am-u-sm-12">
          <form class="am-form" >
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
            <tr>
                <th class="table-id" >新品编号</th>
				 <th class="table-set">品名</th>
				  <th class="table-set">产品图片</th>
				 	
				 <th class="table-title">装箱数</th>
               
              
				
                <th class="table-set">包装L</th>			
                <th class="table-set">包装W</th>
                <th class="table-set">包装H</th>
                <th class="table-set">毛重</th>
                <th class="table-set">配送费</th>
                <th class="table-set">库存价</th>
                <th class="table-type">头程</th>
                <th class="table-author am-hide-sm-only">退货分摊成本 </th> 
                 <th class="table-date am-hide-sm-only">推广成本</th>
                <th class="table-set">促销返点</th>
                <th class="table-set" >定价</th>
                <th class="table-set" >同行售价</th>
                <th class="table-set">最低售价$</th>
                <th class="table-set"  style="background:#e0ecf9">毛利</th>
                <th class="table-set"  style="background:#e0ecf9">毛率</th>
                <th class="table-set">AMZ占比</th>
                <th class="table-set">采购占比</th>
                <th class="table-set">头程占比</th>
				 <th class="table-set">推广占比</th>
				  <th class="table-set">退货率</th>
				   <th class="table-set">返点占比</th>
				   <th class="table-set">单个退货成本</th>
				     <th class="table-set">预测销量/月</th>
				   	<th class="table-set">预测总利</th>
					  	<th class="table-set">建议采购数量</th>
						
				    <th class="table-set" >盈亏量</th>
				    <th class="table-set" >ROI</th>
                <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <tr style="height:100px;">
            
                <td>663</td>
				  <td class="am-hide-sm-only">5756</td>
                <td class="am-hide-sm-only"><img src="assets/img/avatar-1.jpg" width="100" height="100"></td>
                <td class="am-hide-sm-only">154</td>
                <td class="am-hide-sm-only">21</td>
                <td class="am-hide-sm-only">154</td>
         
                <td class="am-hide-sm-only">21</td>
                <td class="am-hide-sm-only">154</td>
                 <td class="am-hide-sm-only">154</td>
        
                 <td class="am-hide-sm-only">54</td>
                <td class="am-hide-sm-only">98</td>
                <td class="am-hide-sm-only">58</td>
                <td class="am-hide-sm-only">54</td>
                <td class="am-hide-sm-only">98</td>
				    <th class="table-set"><input style="width:38px; height:20px;font-size:10px;" id="5566" placeholder=""></th>
					       <td class="am-hide-sm-only">876</td>
                <td class="am-hide-sm-only">58</td>
				  <td class="am-hide-sm-only">54</td>
				  
                <td class="am-hide-sm-only">98%</td>
                <td class="am-hide-sm-only">58%</td>
				  <td class="am-hide-sm-only">54%</td>
                <td class="am-hide-sm-only">98%</td>
                <td class="am-hide-sm-only">58%</td>
                <td class="am-hide-sm-only">32%</td>
				<td class="am-hide-sm-only">54%</td>
					<td class="am-hide-sm-only">54</td>
           	    
                <td class="am-hide-sm-only">58</td>
                <td class="am-hide-sm-only">32</td>
				    <th class="table-set"><input style="width:38px; height:20px;font-size:10px;" id="5566" placeholder="100"></th>
                <td class="am-hide-sm-only">5</td>
				          
                   <td class="am-hide-sm-only">58%</td>
              
             
                <td>
				      <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>更新</button>
                    
                    
                    </div>
                  </div>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                     <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span><a href="cw_kf.html">评审</a></button>
                    </div>
                  </div>
				   <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span>删除</button>
                    </div>
                  </div>
                </td>
              </tr>
              </tbody>
            </table>
        <!--     <div class="am-cf">
              共 15 条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <li class="am-disabled"><a href="#">«</a></li>
                  <li class="am-active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div> -->
            <hr />
            <p>注：.....</p>
          </form>
        </div>

      </div>
					  <!-- Row end -->
					  
					</div>
				</div>
			</div>
		</div>
		<!-- end right Content here -->
		<!--</div>-->
		</div>
		</div>
		<!-- navbar -->
		<a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>
		<!-- <script type="text/javascript" src="assets/js/jquery-2.1.0.js" ></script>
		<script type="text/javascript" src="assets/js/amazeui.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js" ></script>
		<script type="text/javascript" src="assets/js/blockUI.js" ></script> -->
	</body>
	
</html>

