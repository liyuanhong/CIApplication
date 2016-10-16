<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
?>
<link href="<?php echo base_url();?>static/devMS/css/logMan/logMan.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/lib/laydate/laydate.js"></script>



<div id="logManCtrl">
<div style="width:100%;">
    <label style="display:inline;">选择日期：</label>
	<input value="<?php if($requestMethod == "GET"){echo date('Y-m-d');}else if($requestMethod == "POST"){echo $_POST['date_input'];} ?>" id="date_input" class="laydate-icon form-control input_style" style="height:35px;width:200px;display:inline;" onclick="laydate()"/>
	<button type="button" class="btn btn-primary" id="search_log">查看日志</button>
</div>
	
	
	
	
</div>
<div id="logPanel">
<?php
if($requestMethod == 'GET'){
	$da = date('Y-m-d');
	$logfile = './logs/'.$da.'.txt';
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
}else if($requestMethod == 'POST'){
	$theDate = $_POST['date_input'];
	$logfile = './logs/'.$theDate.'.txt';
	$myfile = fopen("testfile.txt", "w");
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
}

?>

<script src="<?php echo base_url();?>static/devMS/js/logMan/logMan.js"></script>

</div>
