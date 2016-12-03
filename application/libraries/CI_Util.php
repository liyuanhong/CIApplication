<?php
function getMemberFromIP() {
	/**
	$json = file_get_contents("http://check.yixia.com/check/index.php?fn=fetchuserlist");
	$members = json_decode($json,true);
	$ip = $_SERVER['REMOTE_ADDR'];
	foreach ($members as $key => $val) {
			if ($val['ip'] == $ip) {
					return $val['sname'];
			}
	}
	return '';
	*/
	
	
	
	return "该功能请自行配置...";
}


function getSessionStr(){
	//已登录的时间戳来作为session
	return time();
}

//打印两个日期之间的所有日期
function prDates($start,$end){
	$dt_start = strtotime($start);
	$dt_end = strtotime($end);
	while ($dt_start<=$dt_end){
		echo date('Y-m-d',$dt_start)."\n";
		$dt_start = strtotime('+1 day',$dt_start);
	}
}

//获取两个日期之间的所有日期为一个数组
function getDates($start,$end){
	$dt_start = strtotime($start);
	$dt_end = strtotime($end);
	$dateArr = array();
	$i = 0;
	while ($dt_start<=$dt_end){
		//echo date('Y-m-d',$dt_start)."\n";
		$dateArr[$i] = date('Y-m-d',$dt_start);
		$dt_start = strtotime('+1 day',$dt_start);
		$i++;
	}
	return $dateArr;
}
?>
