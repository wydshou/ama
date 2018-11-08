<?php
/**
 * @author shou <[<291969317@qq.com>]>
 * @time 2018-11-2
 * 用于销售模块
 */
namespace app\index\controller;
use app\common\controller\HomeBase;
use think\Db;
use think\Loader;
class Sale extends HomeBase
{	
	public function sale()
	{		

	$order = Db::name('order_xs');
		// 昨天订单
 	$uid = session('member_user_auth.uid'); //当前用户id
 	$aid = session('member_user_auth.amz_id'); //亚马逊 授权账号id
	$save_time = strtotime(date('Y-m-d',time() - 24*3600)); //获取昨天时间搓
	$end_time = $save_time + 24 * 3600-1; //昨天结束时间搓
	
	//统计订单时间
	// $order_time = Db::query("SELECT sum(order_total) order_pro,FROM_UNIXTIME(bj_time,'%Y-%m-%d %H:00:00') AS hours,CONCAT(FROM_UNIXTIME(bj_time, '%Y-%m-%d %H:00'),'-',FROM_UNIXTIME(bj_time, '%H')+1,':00') AS `date` FROM ".config('database.prefix')."order_xs WHERE u_id = ".$uid." and s_id = ".$aid." and save_time >=".$save_time.' and save_time <= '.$end_time." GROUP BY hours ORDER BY date");
	// foreach ($order_time as $key => $value) {
	// 	 	# code...
	// 	 }	 
	//  dump($order_time);die;
 	
 		// $save_time = date('Ymd',strtotime(date('Ymd',time() - 24*3600))); //北京昨天时间
 		$list = $order->where(array('u_id'=>$uid,'s_id'=>$aid))->whereTime('save_time','yesterday')->select();
 		$ordertotle = 0;
 		$sum = 0;
 		foreach ($list as $key => $value) {
 			$ordertotle += $value['order_total'];
 			$sum += $value['sum'];
 		}
 		$array = array(
 			'totle'=>count($list),
 			'ordertotle' => $ordertotle,
 			'sum' => $sum
 		);
 		$this->assign('array',$array);
 		//今天订单
 		$today = $order->where(array('u_id'=>$uid,'s_id'=>$aid))->whereTime('save_time','today')->select();
 		$today_order=0;
 		$today_sum = 0;
 		foreach ($today as $k => $v) {
 			$today_order += $v['order_total'];
 			$today_sum += $v['sum'];	
 		}
 		$arr = array(
 			'today'=>count($today),
 			'today_order' => $today_order,
 			'today_sum' => $today_sum
 		);
 		$this->assign('arr',$arr);
		return $this->fetch();
	}

	public function amz()
	{	
		// $luo = time() - config('US_TIME')*3600; //洛杉矶时间
		// $timestart = strtotime(date('Y-m-d'.'00:00:00',$luo-3600*24)); // 洛杉矶昨天时间 11-5 0.00 11-4 14
		// $endYesterday = $timestart+24 * 3600-1;  //昨天结束时间
		// $endYesterday = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
		// dump($this->ustimes($endYesterday));die;
		// echo $this->ustime('2018-11-05T01:24:42.437Z');die;
		$serviceUrl = "https://mws.amazonservices.com/Orders/2013-09-01";
		define('APPLICATION_NAME', 'Orders');
    	define('APPLICATION_VERSION', '2013-09-01');
		$config = array (
		   'ServiceURL' => $serviceUrl,
		   'ProxyHost' => null,
		   'ProxyPort' => -1,
		   'ProxyUsername' => null,
		   'ProxyPassword' => null,
		   'MaxErrorRetry' => 3,
		 );
		 Loader::import('MarketplaceWebServiceOrders/Client', EXTEND_PATH);
		 Loader::import('MarketplaceWebServiceOrders/Model/ListOrdersRequest',EXTEND_PATH);
		 $service = new \MarketplaceWebServiceOrders_Client(
		        AWS_ACCESS_KEY_ID,
		        AWS_SECRET_ACCESS_KEY,
		        APPLICATION_NAME,
		        APPLICATION_VERSION,
		        $config);		
		 $res = array(
		  'MWSAuthToken' => MWS_AUTH_TOKEN,
		  'SellerId' => MERCHANT_ID,
		 );
		 $request = new \MarketplaceWebServiceOrders_Model_ListOrdersRequest($res);
		 // $luo = time() - config('US_TIME')*3600; //洛杉矶时间
		 $timestart = strtotime(date('Y-m-d',time() - 24*3600)); // 洛杉矶时间昨天时间 11-5 0.00 11-4 14
		 $timesend = strtotime(date('Y-m-d',time())); //今天
		 $save_time = date('Y-m-d',strtotime(date('Y-m-d',time() - 24*3600))); //北京昨天时间  
		 $endYesterday = $timestart + 24 * 3600-1;  //昨天结束时间
		 //转为iso时间格式  北京时间查询  今天三个单   查询昨天到今天13个订单
		 $request->setCreatedAfter($this->ustimes($timesend)); // 获取洛杉矶昨天到今天数据 最近一天最新数据
		 // $request->setCreatedBefore($this->ustimes($timesend));
		 $request->setMarketplaceId(MARKETPLACE_ID); //美国站
		 $value = invokeListOrders($service, $request); //亚马逊返回的数据
		 // dump($value);die;
		 $num = count($value['ListOrdersResult']['Orders']['Order']); //订单总数 如果订单只有一条返回一位数组 
		if ($num <= 1){
			$v = $value['ListOrdersResult']['Orders']['Order'];
			if ($v['OrderStatus'] == 'Pending'){
					$amount = 0;
					$CurrencyCode = 0;
			}else{
					$amount = $v['OrderTotal']['Amount'];
					$CurrencyCode = $v['OrderTotal']['CurrencyCode'];
			}
			$pay_time = $this->ustimee($v['PurchaseDate'],'b'); //洛杉矶时间
			$bj_time = $this->ustimee($v['PurchaseDate']); //北京时间搓
			$data = array(
				'order_no' => $v['AmazonOrderId'],
				'pay_time' => $pay_time,
				'bj_time' => $bj_time,
				'order_status' => $v['OrderStatus'],
				'order_total' => $v['OrderTotal']['Amount'],
				'currency' => $v['OrderTotal']['CurrencyCode'],
				'sum' => $v['NumberOfItemsUnshipped'],
				'u_id' => session('member_user_auth.uid'),
				's_id' => session('member_user_auth.amz_id'),
				'save_time' => $timestart
			);
				Db::name('order_xs')->insert($data);
		}else{
			 $data = array();
			foreach ($value['ListOrdersResult']['Orders']['Order'] as $key => $v) {
				if ($v['OrderStatus'] == 'Pending'){
					$amount = 0;
					$CurrencyCode = 0;
				}else{
					$amount = $v['OrderTotal']['Amount'];
					$CurrencyCode = $v['OrderTotal']['CurrencyCode'];
				}
				$pay_time = $this->ustimee($v['PurchaseDate'],'b'); //洛杉矶时间
				$bj_time = $this->ustimee($v['PurchaseDate']); //北京时间搓
				$data[] = [
				'order_no' => $v['AmazonOrderId'],
				'pay_time' => $pay_time,
				'bj_time' => $bj_time,
				'order_status' => $v['OrderStatus'],
				'order_total' => $amount,
				'currency' => $CurrencyCode,
				'sum' => $v['NumberOfItemsUnshipped'],
				'u_id' => session('member_user_auth.uid'),
				's_id' => session('member_user_auth.amz_id'),
				'save_time' => $timestart
				];	
		}
		   $result = Db::name('order_xs')->insertAll($data);	
		   if ($result){
		   		
		   }
		}
	}

	//iso时间
	public function ustime($t)
	{
		$need=stripos($t,"T");
		if ($need){
			$shenme=str_replace('T',' ',$t);
		     //如果是ISO8601格式,转换为时间戳
			$firstpowertime=strtotime($shenme);
		    $firstpowertime=date("Y年n月j日 H:i:s",$firstpowertime-config('US_TIME')*3600);
		    return $firstpowertime;
		}else{
			return false;
		}
	}

		//iso时间
	public function ustimee($t,$l='')
	{	
		$need=stripos($t,"T");
		if ($need){
			$shenme=str_replace('T',' ',$t);
		     //如果是ISO8601格式,转换为时间戳
			$firstpowertime=strtotime($shenme);
		    // $firstpowertime=date("Y年n月j日 H:i:s",$firstpowertime);
			if ($l == ''){
				return $firstpowertime;
			}elseif ($l == 'b'){
				return $firstpowertime-config('US_TIME')*3600;
			}
		}
	}
	//获取当前iso时间  time时间搓  时间减去16小时  洛杉矶时间 
	public function ustimes($time){
		return date('Y-m-d\TH:i:s\Z', $time);
	}
}