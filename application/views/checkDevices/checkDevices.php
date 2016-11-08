<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];
$id = $this->uri->segment(3, 0);

//主机地址
$host = $_SERVER['HTTP_HOST'];


$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];

if($id == "checkeded"){
	//获取没有盘点的设备
	$datas = $this->CheckDevMod->getNoCheckDevs();
	$doThings = "访问了设备盘点页面(未盘点)";
	writeToLog($theTime,$who,$where,$doThings);
}else if($id == ""){
	//获取没有盘点的设备
	$datas = $this->CheckDevMod->getNoCheckDevs();
	$doThings = "访问了设备盘点页面(未盘点)";
	writeToLog($theTime,$who,$where,$doThings);
}else if($id == "no_checked"){
	//获取已经盘点的设备
	$datas = $this->CheckDevMod->getCheckedDevs();
	$doThings = "访问了设备盘点页面(已盘点)";
	writeToLog($theTime,$who,$where,$doThings);
}else if($id == "all_devs"){
	//获取所有的设备
	$datas = $this->CheckDevMod->getAllDevs();
	$doThings = "访问了设备盘点页面(所有设备)";
	writeToLog($theTime,$who,$where,$doThings);
}else if($id == "lost_devs"){
	//获取丢失的设备
	$datas = $this->CheckDevMod->getLostDevs();
	$doThings = "访问了设备盘点页面(丢失设备)";
	writeToLog($theTime,$who,$where,$doThings);
}else if($id == "initaillize"){
	//初始化所有设备
	$datas = $this->CheckDevMod->getLostDevs();
	$doThings = "点击了初始化设备按钮";
	writeToLog($theTime,$who,$where,$doThings);
}
	



?>

<link href="<?php echo base_url();?>static/devMS/css/checkDevices/checkDevices.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/checkDevices/checkDevices.js"></script>

<div style="text-align: center;padding-top:10px;">
	<button type="button" class="btn btn-sm btn-primary" style="margin-right: 20px;" id="checkeded" onclick="getNoCheckedDevs()">未盘点</button>
	<button type="button" class="btn btn-sm btn-success" style="margin-right: 20px;" id="no_checked" onclick="getCheckedDevs()">已盘点</button>
	<button type="button" class="btn btn-sm btn-info" style="margin-right: 20px;" id="all_devs" onclick="getAllDevs()">所有</button>
	<button type="button" class="btn btn-sm btn-warning" style="margin-right: 20px;" id="lost_devs" onclick="getLostDevs()">丢失</button>
	<button type="button" class="btn btn-sm btn-danger" style="margin-right: 20px;" id="initaillize" onclick="initaillizeDevsStatus()">重置</button>
</div>
<div style="margin-top: 20px;">
	<table class="table table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>icon</th>
					<th>设备名</th>
					<th>型号</th>
					<th>编号#</th>
					<th>签借人</th>
					<th style="color:red;">所属</th>
					<th>借出时间</th>
					<th>确定</th>
					<th>丢失</th>
					<th>重置</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			foreach ($datas as $row){
				echo '<tr><td>'.$i.'</td><td><img onclick="showDevInfo()" class="dev_icon" id="icon_'.$row->id.
				'"src="http://'.$host.'/ci/files/thumbnail/'.trim($row->path).'"></img></td>';
				echo '<td>'.$row->device_name.'</td><td>'.$row->model.'</td><td>'.$row->theNum.'</td>';
				echo '<td>'.$row->borrower.'</td><td>'.$row->owner.'</td><td>'.$row->borrow_time.'</td>';
				echo '<td><button type="button" class="btn btn-sm btn-success">确定</button></td>';
				echo '<td><button type="button" class="btn btn-sm btn-warning">丢失</button></td>';
				echo '<td><button type="button" class="btn btn-sm btn-danger">重置</button></td>';
				
				$i++;
				
			}
			?>
			</tbody>
		</table>
</div>