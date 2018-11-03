<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:41:"E:\WWW\ymx./app/index\view\sale\sale.html";i:1541127978;s:42:"E:\WWW\ymx\app\index\view\Public\base.html";i:1541144982;}*/ ?>
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
  
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
			
			
	
			<div class="card-box">

			
			
			
			
			<div class="am-g">
			
			
			
						<!-- Row start -->
						<div class="am-u-md-6">
							<div class="card-box widget-user" style="height: 300px;">
                               
                                	 <h4 class="m-t-0 m-b-5 font-600">实时销售概况（更新:18-10-16 18:54）</h4>
									 
									 		 <table style="width:520px; font-size: 13px;">
                             	  
                             <tr style="border-bottom: 1px solid #f3f3f3; font-weight: 600;height: 30px;" >
                             	<td>日期</td>
								<td>销售额</td>
								<td>订单量</td>
							   <td>销量</td>
                             </tr>
                           
              					<tr style="border-bottom: 1px solid #f3f3f3">
								<td>今日</td>
                             	<td>$2,712</td>
								<td>577</td>
								<td>46</td>
								
                             </tr>
							 
							 	<tr style="border-bottom: 1px solid #f3f3f3">
								<td>昨日</td>
                             	<td>$2,12</td>
								<td>57</td>
								<td>456</td>
								
                             </tr>
                         </table>
									 
                               <div id="index-line-11" style="height: 200px;"></div>

                                
                            </div>
						</div>
						<!-- col end -->
			
			
			
			
			
					<!-- Row start -->
						<div class="am-u-md-4">
							<div class="card-box widget-user" style="height: 300px;">
                                <div>
                                	 <h4 class="m-t-0 m-b-5 font-600">销售额表现(最近7天)</h4>
							 <table style="width:420px; font-size: 13px;">
                             	  
                             <tr style="border-bottom: 1px solid #f3f3f3; font-weight: 600;height: 30px;" >
                             	<td>销售额</td>
	                             <td>订单量</td>
								<td>销量</td>
								 <td>退货数</td>
								<td>退货金额</td>
								<td>退货率</td>
								<td>平均价</td>
                             </tr>
                           
              					<tr style="border-bottom: 1px solid #f3f3f3">
                             	<td>$2,712</td>
								<td>577</td>
								<td>46</td>
								<td>43</td>
								<td>40</td>
								<td>40%</td>
								<td>$19</td>
                             </tr>
                         </table>
                               <div id="index-bar-11" style="height: 180px; "></div>

                                
                                </div>
                            </div>
						</div>
						<!-- col end -->
			
						<!-- col end -->
			
						<!-- col end -->
						<div class="am-u-md-2">
							<div class="card-box widget-user" style="height: 300px;">
                                <div>

  <h4 class="m-t-0 m-b-5 font-600" style="color:red;">重要提醒</h4>
     <div>买家信息</div>

                                       <div class="text-muted  m-b-5 font-10" style=""> 你有<a href="" style="color:red;" class="font-600">3</a>条买家信息，请注意。</div>

                                  <div> 库存提醒</div>

                                       <div class="text-muted  m-b-5 font-10" style=""> 暂无提醒</div>

  <div> 跟卖提醒</div>

  <div class="text-muted  m-b-5 font-10">你有<a href="" style="color:red;" class="font-600">3</a>个商品被跟卖，请注意。</div>

 <div> 评论提醒</div>
 <div class="text-muted  m-b-5 font-10">你有<a href="" style="color:red;" class="font-600">13</a>个商品差评，请注意。</div>
 <div> 退货提醒</div>
<div class="text-muted  m-b-5 font-10">你有<a href="" style="color:red;"class="font-600">3</a>个商品退货，请注意。</div>



                                </div>
                            </div>
						</div>
					</div>
					<div class="am-g">
						
						<!-- col start -->
						<div class="am-u-md-6">
							<div class="card-box" style="height: 483px;">
								<h4 class="m-t-0 m-b-30">今日广告（更新:18-10-16 18:54） <a href="" style="font-size: 10px;">更多></a></h4> 
								<div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
                                        <table class="am-table   am-text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>广告活动</th>
                                                <th>曝光量</th>
                                                <th>点击次数</th>
                                                <th>花费($)</th>
                                                <th>订单</th>
                                                <th>广告销售额($)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">campaign1</a></td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
                                              
     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>

                                                     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
												
												
												     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
												
												
												     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
												
												
												     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
												
												     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
												
												     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
												
												     <tr>
                                                    <td>campaign1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE">4927</a></td>
                                                    <td>72</td>
                                                    <td>18.55</td>
                                                    <td>1</td>
                                                    <td>18.55</td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
							</div>
						</div>
						<!-- col end -->
						
						
						
						
						
						
						
						<!-- col start -->
					



<div class="am-u-md-6">
						<div class="card-box">
							<h4 class="m-t-0" style="padding-bottom: 15px;">广告业绩（更新:18-10-16 18:54）<a href="" style="font-size: 10px;">更多></a></h4>
                             <table style="width: 450px; font-size: 13px;">
                             	  
                             <tr style="border-bottom: 1px solid #f3f3f3; font-weight: 600;height: 30px;" >
                             	<td>花 费</td>
	                             <td>广告销售额</td>
								<td>ACoS</td>
								<td>广告订单</td>
                             </tr>
                           
              					<tr style="border-bottom: 1px solid #f3f3f3">
                             	<td>$2,753.12</td>
								<td>$5,095.77</td>
								<td>54.03%</td>
								<td>199</td>
                             </tr>
                         </table>
							
							<div id="index-line-1" style="height: 345px;"></div>
						</div>
					</div>

						
					</div>


		<div class="am-g">
					<!-- Row start -->
						<div class="am-u-sm-3">
							<div class="card-box">
								<h4 class="m-t-0 m-b-30">自动索评(更新:18-10-16 18:54) <a href="" style="font-size: 10px;">更多></a></h4> 
								<!-- col start -->
										
				     <table style="width: 320px; font-size: 13px;">
                             	  
                             <tr style="border-bottom: 1px solid #f3f3f3; font-weight: 600;height: 30px;" >
                             	<td>发送总数</td>
	                             <td>开启邮件</td>
								<td>开启率</td>
								
                             </tr>
                           
              					<tr style="border-bottom: 1px solid #f3f3f3">
                             	<td>753</td>
								<td>95</td>
								<td>4%</td>
							
                             </tr>
                         </table>
							<div id="index-bar-1" style="height: 271px;"></div>
					
								<!-- col end -->
							</div>
						</div>
						
						<div class="am-u-sm-3">
							<div class="card-box">
								<h4 class="m-t-0 m-b-30">评论反馈统计(更新:18-10-16 18:54) <a href="" style="font-size: 10px;">更多></a></h4> 

	     <table style="width: 320px; font-size: 13px;">
                             	  
                             <tr style="border-bottom: 1px solid #f3f3f3; font-weight: 600;height: 30px;" >
                             	<td>评论数</td>
	                             <td>好评数</td>
								<td>Feedback数</td>
								<td>好评Feedback</td>
                             </tr>
                           
              					<tr style="border-bottom: 1px solid #f3f3f3">
                             	<td><a href="#">753</a></td>
								<td><a href="#">95</a></td>
								<td><a href="#">4</a></td>
							     <td><a href="#">95</a></td>
                             </tr>
                         </table>

								<!-- col start -->
							<div  id="Stack" style="width: 100%;height: 270px; padding-top: 38px;"></div>
								<!-- col end -->
							</div>
						</div>
					<!-- Row end -->
					
					
					
					
					
					<div class="am-u-sm-6">
							<div class="card-box"  style="height: 412px;" >
								<h4 class="m-t-0 m-b-30">评论提醒(更新:18-10-16 18:54) <a href="" style="font-size: 10px;">更多></a></h4> 
<div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
                                        <table class="am-table   am-text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>评分</th>
                                                <th>日期</th>
                                                <th>商品信息</th>
                                           
                                           
                                              
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2 星</td>
                                                    <td>2018-10-19</td>
                                                    <td>
													<div style="font-size:12px;"><a href="https://www.amazon.com/dp/B003DSHDEC" target="_blank" >
													<img src="https://images-na.ssl-images-amazon.com/images/I/514jlnNgBYL._SS75_.jpg" height="30px" width="30px"></a> 
												
									SKU：AA-669 <a href="">子ASIN：B003DSHDEC</a>
													</div>
													
													
													</td>
                                            
                                            
                                                </tr>
                                              
                                                     <tr>
                                                    <td>1 星</td>
                                                    <td>2018-10-19</td>
                                                    <td>
													<div style="font-size:12px;"><a href="https://www.amazon.com/dp/B003DSHDEC" target="_blank" >
													<img src="https://images-na.ssl-images-amazon.com/images/I/514jlnNgBYL._SS75_.jpg"  height="30px" width="30px" ></a> 
												
										SKU：AA-669 子ASIN：B003DSHDEC
													</div>
													
													
													</td>
                                            
                                            
                                                </tr>
                                         

                                   
                                                     <tr>
                                                    <td>1 星</td>
                                                    <td>2018-10-19</td>
                                                    <td>
													<div style="font-size:12px;"><a href="https://www.amazon.com/dp/B003DSHDEC" target="_blank" >
													<img src="https://images-na.ssl-images-amazon.com/images/I/514jlnNgBYL._SS75_.jpg"  height="30px" width="30px" ></a> 
												
										SKU：AA-669 子ASIN：B003DSHDEC
													</div>
													
													
													</td>
                                            
                                            
                                                </tr>
												
												
												
												
                                                     <tr>
                                                    <td>1 星</td>
                                                    <td>2018-10-19</td>
                                                    <td>
													<div style="font-size:12px;"><a href="https://www.amazon.com/dp/B003DSHDEC" target="_blank" >
													<img src="https://images-na.ssl-images-amazon.com/images/I/514jlnNgBYL._SS75_.jpg"  height="30px" width="30px" ></a> 
												
										SKU：AA-669 子ASIN：B003DSHDEC
													</div>
													
													
													</td>
                                            
                                            
                                                </tr>
												
												
												
                                                     <tr>
                                                    <td>1 星</td>
                                                    <td>2018-10-19</td>
                                                    <td>
													<div style="font-size:12px;"><a href="https://www.amazon.com/dp/B003DSHDEC" target="_blank" >
													<img src="https://images-na.ssl-images-amazon.com/images/I/514jlnNgBYL._SS75_.jpg"  height="30px" width="30px" ></a> 
												
										SKU：AA-669 子ASIN：B003DSHDEC
													</div>
													
													
													</td>
                                            
                                            
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
								<!-- col end -->
							</div>
						</div>
				</div>
	<div class="am-g">
		<div class="am-u-md-12" >
							<div class="card-box" style="height: 420px;">
								<h4 class="m-t-0 m-b-30">实时商品畅销榜（更新:18-10-16 20:11）<a href="" style="font-size: 10px;">更多></a></h4> 
								<div class="am-scrollable-horizontal am-text-ms" style="font-family: '微软雅黑';">
                                        <table class="am-table  am-text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>名次</th>
                                                <th>图片</th>
                                                <th>商品编码</th>
                                                <th>今日销售额 ($)</th>
                                                <th>今日销量</th>
                                                <th>更新时间</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE"><img src="https://images-na.ssl-images-amazon.com/images/I/51uE7WALWPL._SL1000_.jpg" width="30" height="30"></a></td>
                                                    <td>SKU:AMZ-ORA,子ASIN:B003ASATGE</td>
                                                    <td>3,315</td>
                                                    <td>211</td>
                                                    <td>2018-10-16 01:24</td>
                                                </tr>
                                                       <tr>
                                                    <td>2</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE"><img src="https://images-na.ssl-images-amazon.com/images/I/51uE7WALWPL._SL1000_.jpg" width="30" height="30"></a></td>
                                                    <td>SKU:AMZ-ORA,子ASIN:B003ASATGE</td>
                                                    <td>3,315</td>
                                                    <td>211</td>
                                                    <td>2018-10-16 01:24</td>
                                                </tr>
                                                       <tr>
                                                    <td>3</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE"><img src="https://images-na.ssl-images-amazon.com/images/I/51uE7WALWPL._SL1000_.jpg" width="30" height="30"></a></td>
                                                    <td>SKU:AMZ-ORA,子ASIN:B003ASATGE</td>
                                                    <td>3,315</td>
                                                    <td>211</td>
                                                    <td>2018-10-16 01:24</td>
                                                </tr>
                                                
           <tr>
                                                    <td>4</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE"><img src="https://images-na.ssl-images-amazon.com/images/I/51uE7WALWPL._SL1000_.jpg" width="30" height="30"></a></td>
                                                    <td>SKU:AMZ-ORA,子ASIN:B003ASATGE</td>
                                                    <td>3,315</td>
                                                    <td>211</td>
                                                    <td>2018-10-16 01:24</td>
                                                </tr>
                                                
                                                           <tr>
                                                    <td>5</td>
                                                    <td><a href="https://www.amazon.com/dp/B003ASATGE"><img src="https://images-na.ssl-images-amazon.com/images/I/51uE7WALWPL._SL1000_.jpg" width="30" height="30"></a></td>
                                                    <td>SKU:AMZ-ORA,子ASIN:B003ASATGE</td>
                                                    <td>3,315</td>
                                                    <td>211</td>
                                                    <td>2018-10-16 01:24</td>
                                                </tr>
                                                
                                              
                                            </tbody>
                                        </table>
                                    </div>
							</div>
						</div>




					<!-- Row end -->
				</div>
					来自 <a href="#" target="_blank" title="Adminto">Adminto</a>
</div>
	</div>
		</div>
		<!-- navbar -->
		<a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>
		<script type="text/javascript" src="/public/Home/assets/js/charts/yy_proChart.js" ></script>
	</body>
</html>

