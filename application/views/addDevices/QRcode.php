<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
require dirname(__FILE__)."/../../libraries/phpqrcode/qrlib.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];
	
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了添加设备页面";
writeToLog($theTime,$who,$where,$doThings);

?>

<?php 
	include('../lib/full/qrlib.php'); 
	QRcode::png('http://www.baidu.com/');
	
	
?>