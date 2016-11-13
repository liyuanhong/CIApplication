<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$id = $this->uri->segment(3, 0);
//echo $id;

$data = $this->GetDevInfoMod->getDevInfoFromId($id);
//将返回的数组转换为对象
$jstr = json_encode($data);
$jdata = json_decode($jstr);
//echo $jstr."<br>";


$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了 ".$jdata[0]->device_name." 的修改设备信息页面";
writeToLog($theTime,$who,$where,$doThings);
?>

<link href="<?php echo base_url();?>static/devMS/css/showDev/showDevInfoPage.css" rel="stylesheet">

<button type="button" class="btn btn-sm btn-success btn-back" onclick="javascript:history.back(-1);">《返回</button>
<div id="show_dev_inifo_page_div">
	<table class="table table-bordered">
		<tr class="info_table">
			<td>设备id: <?php echo $jdata[0]->id;?></td><td>设备名: <?php echo $jdata[0]->device_name;?></td><td>设备型号: <?php echo $jdata[0]->model;?></td><td>设备编号: <?php echo $jdata[0]->theNum;?></td><td>借出时间: <?php echo $jdata[0]->borrow_time;?></td>
		</tr>
		<tr class="info_table">
			<td>状态: <?php if($jdata[0]->status == 0){
				echo "无人借阅";
			}else if($jdata[0]->status == 1){
				echo "申请中";
			}else if($jdata[0]->status == 2){
				echo "已借出";
			};?></td><td>借阅者: <?php echo $jdata[0]->borrower;?></td><td>所属:  <?php echo $jdata[0]->owner;?></td><td>系统版本: <?php echo $jdata[0]->version;?></td><td>添加时间: <?php echo $jdata[0]->add_time;?></td>
		</tr>
		<tr class="info_table">
			<td>平台: <?php echo $jdata[0]->plateform;?></td><td>品牌: <?php echo $jdata[0]->brand;?></td><td colspan="3">其他信息: <?php echo $jdata[0]->other;?></td>
		</tr>
		<tr class="info_table">
			<td colspan="5">备注: <?php echo $jdata[0]->comments;?></td>
		</tr>
	</table>
</div>


<link rel="stylesheet" href="<?php echo base_url();?>static/lib/slideLayer/reset.css">
<link rel="stylesheet" href="<?php echo base_url();?>static/lib/slideLayer/style.css">
<div id="slider" style="position: relative; overflow: hidden;">
	<ul class="slides clearfix" style="position: relative; width: 400%; right: 300%;">
		<li style="width: 25%; float: left;"><div class="responsive" style="text-align:center;height:500px;"><img  style="height:500px;" src="<?php echo base_url();?>static/lib/slideLayer/1.jpg"></div></li>
		<li style="width: 25%; float: left;"><div class="responsive" style="text-align:center;height:500px;"><img  style="height:500px" src="<?php echo base_url();?>static/lib/slideLayer/2.jpg"></div></li>
		<li style="width: 25%; float: left;"><div class="responsive" style="text-align:center;height:500px;"><img  style="height:500px" src="<?php echo base_url();?>static/lib/slideLayer/3.jpg"></div></li>
		<li style="width: 25%; float: left;"><div class="responsive" style="text-align:center;height:500px;"><img  style="height:500px" src="<?php echo base_url();?>static/lib/slideLayer/4.jpg"></div></li>
	</ul>
	<ul class="controls" style="cursor: pointer;">
		<li style="position: absolute; margin-top: -36px;"><img src="<?php echo base_url();?>static/lib/slideLayer/prev.png" alt="previous"></li>
		<li style="position: absolute; margin-top: -36px;"><img src="<?php echo base_url();?>static/lib/slideLayer/next.png" alt="next"></li>
	</ul>
	<ul class="pagination" style="position: relative; left: 50%; bottom: 20px; margin: 0px 0px 0px -46.5px;">
		<li class="" style="margin-right: 15px; float: left; cursor: pointer; width: 12px; height: 12px; border-radius: 9999px;"></li>
		<li class="" style="margin-right: 15px; float: left; cursor: pointer; width: 12px; height: 12px; border-radius: 9999px;"></li>
		<li class="" style="margin-right: 15px; float: left; cursor: pointer; width: 12px; height: 12px; border-radius: 9999px;"></li>
		<li class="active" style="margin-right: 15px; float: left; cursor: pointer; width: 12px; height: 12px; border-radius: 9999px;"></li>
	</ul>
</div>

<script src="<?php echo base_url();?>static/lib/slideLayer/easySlider.js"></script>
<script type="text/javascript">
	$(function() {
		$("#slider").easySlider( {
			slideSpeed: 500,
			paginationSpacing: "15px",
			paginationDiameter: "12px",
			paginationPositionFromBottom: "20px",
			slidesClass: ".slides",
			controlsClass: ".controls",
			paginationClass: ".pagination"					
		});
	});
</script>

