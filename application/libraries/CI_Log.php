<?php
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

?>