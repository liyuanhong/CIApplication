<?php

function getMemberFromIP() {
	
	$json = file_get_contents("http://check.yixia.com/check/index.php?fn=fetchuserlist");
	$members = json_decode($json,true);
	$ip = $_SERVER['REMOTE_ADDR'];
	foreach ($members as $key => $val) {
			if ($val['ip'] == $ip) {
					return $val['sname'];
			}
	}
	return '';
	
	//return "honghong~";
	
}

?>
