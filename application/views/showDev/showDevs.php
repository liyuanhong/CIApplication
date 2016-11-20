<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];

//主机地址
$host = $_SERVER['HTTP_HOST'];

//获取查询的设备信息
//$datas = $this->DevManageMod->getDevInfo();
$requestMethod = $_SERVER['REQUEST_METHOD'];
if($requestMethod == "POST"){
	$plateform = $_POST['plateform'];
	$brand = $_POST['brand'];
	$version = $_POST['version'];
	$status = $_POST['status'];
	$category = $_POST['category'];
	$borrower = $_POST['borrower'];
}else if($requestMethod == "GET"){
	$datas = $this->DevManageMod->getDevInfo();
	$plateform = 'all';
	$brand = 'all';
	$version = 'all';
	$status = 'all';
	$category = 'all';
	$borrower = '';
}


$datas = $this->ShowDevMod->searchDevs($plateform,$brand,$version,$status,$category,$borrower);
//echo json_encode($datas);

	
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了设备查询页面";
writeToLog($theTime,$who,$where,$doThings);

?>

<link href="<?php echo base_url();?>static/devMS/css/showDev/showDevs.css" rel="stylesheet">


<div id="search_area">
	<div>
		<table _border="1" style="width:100%;height:100px;margin-left:20px;">
			<tr>
				<td style="width:33%;">
					<label class="label_style">平台：</label>
					<select id="dev_plateform" class="select_style form-control">
						<option value="all">all</option>
						<option value="android">android</option>
						<option value="ios">ios</option>
					</select>
				</td>
				<td style="width:33%;">
					<label class="label_style">品牌：</label>
					<select id="dev_brand" class="select_style form-control">
						<option value="all">all</option>
						<option value="三星">三星</option>
						<option value="小米">小米</option>
						<option value="华为">华为</option>
						<option value="魅族">魅族</option>
					</select>
				</td>
				<td style="width:33%;">
					<label class="label_style">系统版本：</label>
					<select id="dev_version" class="select_style form-control">
						<option value="all">all</option>
						<option value="7">7</option>
						<option value="6">6</option>
						<option value="5.1">5.1</option>
						<option value="5.0">5.0</option>
						<option value="4.4">4.4</option>
						<option value="4.3">4.3</option>
						<option value="4.2">4.2</option>
						<option value="4.1">4.1</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="label_style" class="label_style">状态：</label>
					<select id="dev_status" class="select_style form-control">
						<option value="all">all</option>
						<option value="2">已借出设备</option>
						<option value="0">未借出设备</option>
						<option value="1">申请中</option>
					</select>
				</td>
				<td>
					<label>分类：</label>
					<select id="dev_category"  class="select_style form-control" style="margin-left:0px;">
						<option value="all" >all</option>
						<option value="手机">手机</option>
						<option value="平板">平板</option>
						<option value="其他">其他</option>
					</select>
				</td>
				<td>
					<label>签借人：</label>
					<input id="borrower" class="form-control select_style" style="margin-left: 15px;"></input>
				</td>
			</tr>
		</table>
	</div>
	<div>
		<button class="btn btn-primary" style="width:100px;" id="search_btn" onclick="searchDevs()">查 询</button>
	</div>
	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>icon</th>
					<th>设备名</th>
					<th>型号</th>
					<th>编号#</th>
					<th>签借人</th>
					<th>申请</th>
					<th style="color:red;">所属</th>
					<th>借出时间</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$i = 1;
				foreach ($datas as $row){
					echo '<tr><td>'.$i.'</td><td><img onclick="showDevInfo()" class="dev_icon" id="icon_'.$row->id.'"src="http://'.$host.'/ci/files/thumbnail/'.trim($row->path).'"></img>';
					echo '</td><td id="label_'.$row->id.'">'.$row->device_name.'</td><td>'.$row->model.'</td><td>'.$row->theNum.'</td>';
					if($row->status == 0){
						echo '<td><input type="text" class="form-control" style="width:80px;" id="input_'.$row->id.'"></td>';
						echo '<td><button class="btn btn-sm btn-success" onclick="applyFor()" id="'.$row->id.'">申 请</button></td>';
					}else if($row->status == 1){
						echo '<td>'.$row->borrower.'</td>';
						echo '<td><button class="btn btn-sm btn-danger" onclick="cancleApplyFor()" id="'.$row->id.'">取 消</button></td>';
					}else if($row->status == 2){
						echo '<td>'.$row->borrower.'</td>';
						echo '<td></td>';
						
					}
					
					echo '<td style="color:red;">'.$row->owner.'</td>
					<td>'.$row->borrow_time.'</td>
					</tr>';
					$i = $i + 1;
				}
			?>
				
			</tbody>
		</table>
	</div>
	
</div>

<script src="<?php echo base_url();?>static/devMS/js/showDev/showDevs.js"></script>

<script type="text/javascript"> 
$(document).ready(function(){ 
	$("#dev_plateform").val("<?php echo $plateform;?>");
	$("#dev_brand").val("<?php echo $brand;?>");
	$("#dev_version").val("<?php echo $version;?>");
	$("#dev_status").val("<?php echo $status;?>");
	$("#dev_category").val("<?php echo $category;?>");
	$("#borrower").val("<?php echo $borrower;?>");
}); 
</script> 


