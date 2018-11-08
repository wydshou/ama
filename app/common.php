<?php
/**
 * 自定义助手函数库
 */
require_once 'helper.php'; 
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;
/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key  加密密钥
 * @param int $expire  过期时间 (单位:秒)
 * @return string 
 */
function think_ucenter_encrypt($data, $key, $expire = 0) {
	$key  = md5($key);
	$data = base64_encode($data);
	$x    = 0;
	$len  = strlen($data);
	$l    = strlen($key);
	$char =  '';
	for ($i = 0; $i < $len; $i++) {
		if ($x == $l) $x=0;
		$char  .= substr($key, $x, 1);
		$x++;
	}
	$str = sprintf('%010d', $expire ? $expire + time() : 0);
	for ($i = 0; $i < $len; $i++) {
		$str .= chr(ord(substr($data,$i,1)) + (ord(substr($char,$i,1)))%256);
	}
	return str_replace('=', '', base64_encode($str));
}

/**
 * 系统解密方法
 * @param string $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param string $key  加密密钥
 * @return string 
 */
function think_ucenter_decrypt($data, $key){
	$key    = md5($key);
	$x      = 0;
	$data   = base64_decode($data);
	$expire = substr($data, 0, 10);
	$data   = substr($data, 10);
	if($expire > 0 && $expire < time()) {
		return '';
	}
	$len  = strlen($data);
	$l    = strlen($key);
	$char = $str = '';
	for ($i = 0; $i < $len; $i++) {
		if ($x == $l) $x = 0;
		$char  .= substr($key, $x, 1);
		$x++;
	}
	for ($i = 0; $i < $len; $i++) {
		if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
			$str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
		}else{
			$str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
		}
	}
	return base64_decode($str);
}

/**
 * @param 读取配置文件
 */
function load_config()
{
	$list=Db::name('config')->where('status',1)->select();
	$config=[];
	foreach ($list as $k => $v) {
		$config[trim($v['name'])]=$v['value'];
	}
	return $config;
}

/**
 * 保存用户行为，前台用户和后台用户
 * @param int $uid 用户id
 * @param string $name 用户名
 * @param string $type config('FRONTEND_USER')/config('BACKEND_USER')
 * @param string $info 行为描述
 */
function storage_user_action($uid,$name,$type,$info){
	if(config('storage_user_action')==true){
		Db::name('user_action')->insert([
		'type'=>$type,
		'user_id'=>$uid,
		'uname'=>$name,
		'add_time'=>time(),
		'info'=>$info]);
	}
}

/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装） 
 * @return mixed
 */
function get_client_ip($type = 0,$adv=false) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if($adv){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}
/**
 * 	签名
 */

function data_auth_sign($data) {
	//数据类型检测
	if(!is_array($data)){
		$data = (array)$data;
	}
	ksort($data); //排序
	$code = http_build_query($data); //url编码并生成query字符串
	$sign = sha1($code); //生成签名
	return $sign;
}
/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 * @author shou <291969317@qq.com>
 */
function list_to_tree($list, $pk='id', $pid = 'pid', $child = 'children', $root = 0) {
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId =  $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

 /**
*   发送邮箱
*   @param $to 目标邮箱 $name 标题
*   @param $body 邮箱内容
*   @return true  错误信息
*/
function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){
    vendor('mailer.PHPMailer');
    vendor('mailer.SMTP'); 
    $mail = new \Phpmailer();
    $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();  // 设定使用SMTP服务
    $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
  //  $mail->SMTPSecure = 'ssl';                 // 使用安全协议
    $mail->Host       = config('MAIL_HOST');  // SMTP 服务器
    $mail->Port       = 25;  // SMTP服务器的端口号
    $mail->Username   = config('MAIL_USERNAME');  // SMTP服务器用户名
    $mail->Password   = config('MAIL_PASSWORD');  // SMTP服务器密码
    $mail->From = config('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
    $mail->FromName = config('MAIL_FROMNAME'); //发件人姓名
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress(config('MAIL_FROM'), config('MAIL_FROMNAME'));
    $mail->AddCC($to); //添加抄送人      163邮箱限制 先发送邮箱自己账号 再抄送用户账号
    if(is_array($attachment)){ // 添加附件 
        foreach ($attachment as $file){
            is_file($file) && $mail->AddAttachment($file);
        }
    }
    return $mail->Send() ? true : $mail->ErrorInfo;
}

//驼峰命名法转下划线风格
function to_under_score($str){
        
    $array = array();
    for($i=0;$i<strlen($str);$i++){
        if($str[$i] == strtolower($str[$i])){
            $array[] = $str[$i];
        }else{
            if($i>0){
                $array[] = '_';
            }
            $array[] = strtolower($str[$i]);
        }
    }
    
    $result = implode('',$array);
    return $result;
}

/**
 * @author shou <[]>
 * 亚马逊接口订单数据 返回json数据
 */
function invokeListOrders(MarketplaceWebServiceOrders_Interface $service, $request)
  {
      try {
        $response = $service->ListOrders($request);
        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $source = $dom->saveXML();
        // 返回json数据
        // if(is_file($source)){ //传的是文件，还是xml的string的判断
        //   $xml_array=simplexml_load_file($source);
        // }else{
        //   $xml_array=simplexml_load_string($source);
        // }
        // $json = json_encode($xml_array);
        // return $json;
        //返回数组
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($source, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;

     } catch (MarketplaceWebServiceOrders_Exception $ex) {
        $error = "Caught Exception: " . $ex->getMessage() . "\n"."Response Status Code: " . $ex->getStatusCode() . "\n"."Error Code: " . $ex->getErrorCode() . "\n"."XML: " . $ex->getXML() . "\n";
        return $error;
     }
 }
// function xmlToArray($xml)
//  {
//         //禁止引用外部xml实体
//         libxml_disable_entity_loader(true);
//         $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
//         return $values;
//  }


function total($type) {
        switch ($type) {
            case 3: { // 本月
                $start=mktime(0,0,0,date('m'),1,date('Y'));
                $end=mktime(0,0,0,date('m'),date('d')+1,date('Y'));
            };break;
            case 6: { //上月
                $start = mktime(0,0,0,date('m')-1,1,date('Y'));
                $end = mktime(0,0,0,date('m'),1,date('Y'))-1;
            };break;
            case 7: { //本周
                $start = mktime(0,0,0,date('m'),date('d')-date('w'),date('Y'));
                $end = mktime(0,0,0,date('m'),date('d'),date('Y'));
            };break;
            case 8: { //上周
                $start = mktime(0,0,0,date('m'),date('d')-7-date('w'),date('Y'));
                $end = mktime(0,0,0,date('m'),date('d')-date('w'),date('Y'))-1;
            };break;
            case 4: { // 本年
                $start = mktime(0,0,0,1,1,date('Y'));
                $end = mktime(0,0,0,1,1,date('Y')+1);
            };break;
            case 5: { // 昨天
                $start = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
                $end = mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
            };break;
            case 9: { // 前七天
                $start = mktime(0,0,0,date('m'),date('d')-6,date('Y'));
                $end = mktime(date('H'),date('m'),date('s'),date('m'),date('d'),date('Y'));
            };break;
            case 2: { // 前30天
                $start = mktime(0,0,0,date('m'),date('d')-29,date('Y'));
                $end = mktime(date('H'),date('m'),date('s'),date('m'),date('d'),date('Y'));
            };break;
            case 1: { // 今天
                $start = mktime(0,0,0,date('m'),date('d'),date('Y'));
                $end = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
            };break;
            default:{
                return '';
            }
 
        }
        // return " BETWEEN '" . date('Y-m-d H:i:s',$start) . "' AND '" . date('Y-m-d H:i:s',$end) . "'";
    }
