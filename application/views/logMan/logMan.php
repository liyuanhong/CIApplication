
<link href="<?php echo base_url();?>static/devMS/css/logMan/logMan.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/lib/laydate/laydate.js"></script>


<div id="logManCtrl">
<div style="width:970px; margin:0px auto;padding:10px;">
    <label>选择日期：</label><input class="laydate-icon" onclick="laydate()"><br /><br />
</div>





<script>
;!function(){
laydate({
   elem: '#demo'
})
}();
</script>
</body>
</html>
<div style="display:none">
	<script type="text/javascript">
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F6f798e51a1cd93937ee8293eece39b1a' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5718743'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s9.cnzz.com/stat.php%3Fid%3D5718743%26show%3Dpic2' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
	
	
	
	
	
	
	
</div>
<div id="logPanel">
<?php
$da = date('Y-m-d');
$logfile = './logs/'.$da.'.txt';
if(file_exists($logfile)){
	$file = fopen($logfile , "r");
	while(!feof($file)){
		$txtLine = fgets($file);
		//$arr = explode(" ",$txtLine);
		//echo count($arr);
		echo $txtLine.'<br/>';
	}
	fclose($file);
}else{
	echo "今天没有日志...";
}
?>

</div>
