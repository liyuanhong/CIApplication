<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];

//获取日志所在行
function getLineNumber($num){
	$lineNum = (string)$num;
	$num = $lineNum;
	$num_0 = 5 - strlen($lineNum);
	for($i = 0;$i < $num_0;$i++){
		$num = "0".$num;
	}
	return $num;
	//return strlen((string)$num);
	//return (string)$num;
}	
	
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了日志管理页面";
writeToLog($theTime,$who,$where,$doThings);



?>
<link href="<?php echo base_url();?>static/devMS/css/logMan/logMan.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/lib/laydate/laydate.js"></script>



<div id="logManCtrl">
<div style="width:100%;">
    <label style="display:inline;">选择日期：</label>
	<input value="<?php if($requestMethod == "GET"){echo date('Y-m-d');}else if($requestMethod == "POST"){echo $_POST['date_input'];} ?>" id="date_input" class="laydate-icon form-control input_style" style="height:35px;width:200px;display:inline;" onclick="laydate()"/>
	<button type="button" class="btn btn-primary" id="search_log">查看日志</button>
</div>

<div style="width:100%;margin-top: 5px;">
    <label style="display:inline;">开始日期：</label>
	<input value="<?php if($requestMethod == "GET"){echo date('Y-m-d');}else if($requestMethod == "POST"){echo $_POST['date_input'];} ?>" id="date_input" class="laydate-icon form-control input_style" style="height:35px;width:200px;display:inline;" onclick="laydate()"/>
	<label style="display:inline;">结束日期：</label>
	<input value="<?php if($requestMethod == "GET"){echo date('Y-m-d');}else if($requestMethod == "POST"){echo $_POST['date_input'];} ?>" id="date_input" class="laydate-icon form-control input_style" style="height:35px;width:200px;display:inline;" onclick="laydate()"/>
	<label style="display:inline;">搜索词：</label>
	<input class="form-control input_style" style="height:35px;width:200px;display:inline;"/>
	<button type="button" class="btn btn-primary" id="search_log">查看日志</button>
</div>
	
	
	
	
</div>
<div id="logPanel">
<?php
//获取文件的行数
function getFileLines($file){
	$line = 0 ; 
	$fp = fopen($file , 'r') or die("open file failure!");  
	if($fp){  
		while(stream_get_line($fp,8192,"\n")){  
		   $line++;  
		}  
		fclose($fp);
	}    
	return $line;  
}
//读取文件的指定行
function getLine($file, $line, $length = 4096){
    $returnTxt = null; // 初始化返回
    $i = 1; // 行数
 
    $handle = @fopen($file, "r");
    if ($handle) {
        while (!feof($handle)) {
            $buffer = fgets($handle, $length);
            if($line == $i) $returnTxt = $buffer;
            $i++;
        }
        fclose($handle);
    }
    return $returnTxt;
}
//返回指定日志文件的内容
if($requestMethod == 'GET'){
	$da = date('Y-m-d');
	$logfile = './logs/'.$da.'.txt';
	if(file_exists($logfile)){
		$lines = getFileLines($logfile);
		$l = 1;
		for($i=$lines;$i > 0;$i--){
			$txtLine = getLine($logfile, $i);
			if(strstr($txtLine,"*")){
				$arr = explode("*",$txtLine);
				//echo count($arr);
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.getLineNumber($l)." -- ".'</p></b>';
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[0].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[1].'</p></b>';
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[2].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[3].'</p></b><br/>';
				$l++;
			}else{
				echo '<b><p style="margin:0px;color:#428BCA;">'.$txtLine.'</p></b>';
			}
		}
	}else{
		echo "今天没有日志...";
	}
	
	/**
	if(file_exists($logfile)){
		$file = fopen($logfile , "r");
		while(!feof($file)){
			$txtLine = fgets($file);
			if(strstr($txtLine,"*")){
				$arr = explode("*",$txtLine);
				//echo count($arr);
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[0].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[1].'</p></b>';
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[2].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[3].'</p></b><br/>';
			}else{
				echo '<b><p style="margin:0px;color:#428BCA;">'.$txtLine.'</p></b>';
			}
			
		}
		fclose($file);
	}else{
		echo "今天没有日志...";
	}
	*/
}else if($requestMethod == 'POST'){
	$theDate = $_POST['date_input'];
	$logfile = './logs/'.$theDate.'.txt';
	if(file_exists($logfile)){
		$lines = getFileLines($logfile);
		$l = 1;
		for($i=$lines;$i > 0;$i--){
			$txtLine = getLine($logfile, $i);
			if(strstr($txtLine,"*")){
				$arr = explode("*",$txtLine);
				//echo count($arr);
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.getLineNumber($l)." -- ".'</p></b>';
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[0].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[1].'</p></b>';
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[2].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[3].'</p></b><br/>';
				$l++;
			}else{
				echo '<b><p style="margin:0px;color:#428BCA;">'.$txtLine.'</p></b>';
			}
		}
	}else{
		echo "今天没有日志...";
	}
	/**
	$myfile = fopen("testfile.txt", "w") or die("open file failure!"); ;
	fwrite($myfile, $theDate."aaa\n");
	fclose($myfile);
	if(file_exists($logfile)){
		$file = fopen($logfile , "r");
		while(!feof($file)){
			$txtLine = fgets($file);
			if(strstr($txtLine,"*")){
				$arr = explode("*",$txtLine);
				//echo count($arr);
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[0].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[1].'</p></b>';
				echo '<b><p style="margin:0px;color:#428BCA;display:inline;">'.$arr[2].'</p></b>';
				echo '<b><p style="margin:0px;_color:#428BCA;display:inline;">'.$arr[3].'</p></b><br/>';
			}else{
				echo '<b><p style="margin:0px;color:#428BCA;">'.$txtLine.'</p></b>';
			}
		}
		fclose($file);
	}else{
		echo "今天没有日志...";
	}
	*/
}

?>

<script src="<?php echo base_url();?>static/devMS/js/logMan/logMan.js"></script>

</div>
