<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];

function addSpaceWho($str){
	$len = mb_strlen($str,"UTF-8");
	$len = 4 - $len;
	for($i = 0;$i < $len*2;$i++){
		$str = $str." ";
	}
	return $str;
}

function createLogStr($theTime,$who,$where,$doThings){
	return $theTime." "."*".addSpaceWho($who)."*".$where." "."*".$doThings;
}

function writeToLog($theTime,$who,$where,$doThings){
		$da = date('Y-m-d');
		$theLog = createLogStr($theTime,$who,$where,$doThings);
		$myfile = './logs/'.$da.'.txt';
		$myfile = fopen($myfile, "a+");
		fwrite($myfile, $theLog."\n");
		fclose($myfile);
	}
	
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
		//return "";
}
	
	
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了添加设备页面";
writeToLog($theTime,$who,$where,$doThings);

?>
userMan