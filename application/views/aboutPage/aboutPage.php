<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

//主机地址
$host = $_SERVER['HTTP_HOST'];

$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了关于系统页面";
writeToLog($theTime,$who,$where,$doThings);

?>
<style type="text/css">
#like-btn{
	cursor:pointer;
}
</style>

<div style="width: 100%;height:100%;background-color:#EEEEFF">

<div style="width: 100%;height:200px;background-color:#EEEEFF">

</div>
<div style="width: 100%;height:200px;background-color:#EEEEFF;text-align:center;">
<h3 style="margin-top:0px;margin-bottom:20px;color:">亲，喜欢就点个赞吧~</h3>
<img id="like-btn" style="width:150px;height:150px;"src="<?php echo "http://".$host."/imgs/click_on.png";?>"></img>
<img style="width:1px;height:1px;"src="<?php echo "http://".$host."/imgs/click_down.png";?>"></img>
</div>
<div>
<h4 id="like" style="text-align:center;margin-top:30px;" hidden>O(∩_∩)O   Thanks you ~</h4>
<div style="text-align:center;padding-top:20px;" target="_blank"><label>欢迎查看源码：<a href="https://github.com/liyuanhong/CIApplication">https://github.com/liyuanhong/CIApplication</a></label></div>
<div style="text-align:center;padding-top:20px;"><label style="margin-top:0px;margin-bottom:20px;color:">设备管理系统--Version2.0~</label></div>
</div>
</div>


<script type="text/javascript">
$('#like-btn').mousedown(function(){
	$("#like-btn").attr("src",'<?php echo "http://".$host."/imgs/click_down.png"; ?>');
	$("#like").show();
	var host = window.location.host;
	$.ajax({
    	type: "get",
        url: "http://" + host + "/index.php/welcome/likeDev",
        data: {},
        success: function (result) {
            
        }
   });
});

$('#like-btn').mouseup(function(){
	//$("#like-btn").attr("src",'<?php echo "http://".$host."/imgs/click_on.png"; ?>');
});
</script>