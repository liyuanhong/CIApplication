<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

$ses = isset($_POST['session'])?$_POST['session']:'';
$session = "";
if($ses == ""){
	echo "请登录...";
	exit();
}

$requestMethod = $_SERVER['REQUEST_METHOD'];


//主机地址
$host = $_SERVER['HTTP_HOST'];

$requestMethod = $_SERVER['REQUEST_METHOD'];
if($requestMethod == "POST"){
	$plateform = $_POST['plateform'];
	$brand = $_POST['brand'];
	$version = $_POST['version'];
	$status = $_POST['status'];
	$category = $_POST['category'];
	$borrower = $_POST['borrower'];
	$old_dev = $_POST['old_dev'];
}else if($requestMethod == "GET"){
	$datas = $this->DevManageMod->getDevInfo();
	$plateform = 'all';
	$brand = 'all';
	$version = 'all';
	$status = 'all';
	$category = 'all';
	$borrower = '';
	$old_dev = 'all';
}


$datas = $this->ShowDevMod->searchDevs($plateform,$brand,$version,$status,$category,$borrower,$old_dev);



$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了管理设备页面";
writeToLog($theTime,$who,$where,$doThings);

?>

<link href="<?php echo base_url();?>static/devMS/css/manDevices/manDevices.css" rel="stylesheet">


<div id="search_area">
	<div>
		<table _border="1" style="width:100%;height:100px;margin-left:20px;">
			<tr>
				<td style="width:25%;">
					<label class="label_style">平台：</label>
					<select id="dev_plateform" class="select_style form-control">
						<option value="all">all</option>
						<option value="android">android</option>
						<option value="ios">ios</option>
					</select>
				</td>
				<td style="width:25%;">
					<label class="label_style">品牌：</label>
					<select id="dev_brand" class="select_style form-control">
						<option value="all">all</option>
						<option value="三星">三星</option>
						<option value="小米">小米</option>
						<option value="华为">华为</option>
						<option value="魅族">魅族</option>
						<option value="oppo">oppo</option>
						<option value="vivo">vivo</option>
						<option value="联想">联想</option>
						<option value="中兴">中兴</option>
						<option value="nexus">nexus</option>
						<option value="其他">其他</option>
					</select>
				</td>
				<td style="width:25%;">
					<label class="label_style">系统版本：</label>
					<select id="dev_version" class="select_style form-control">
						<option value="all">all</option>
						<option value="8">8</option>
						<option value="7">7</option>
						<option value="6">6</option>
						<option value="5.1">5.1</option>
						<option value="5.0">5.0</option>
						<option value="4.4">4.4</option>
						<option value="4.3">4.3</option>
						<option value="4.2">4.2</option>
						<option value="4.1">4.1</option>
						<option value="ios7">ios7</option>
						<option value="ios8">ios8</option>
						<option value="ios9">ios9</option>
						<option value="ios10">ios10</option>
					</select>
				</td>
				<td style="width:25%;">
					<label class="label_style" class="label_style">状态：</label>
					<select id="dev_status" class="select_style form-control">
						<option value="all">all</option>
						<option value="2">已借出设备</option>
						<option value="0">未借出设备</option>
						<option value="1">申请中</option>
					</select>
				</td>
			</tr>
			<tr>
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
					<label>可用：</label>
					<select id="old_dev"  class="select_style form-control" style="margin-left:0px;">
						<option value="all" >all</option>
						<option value="0">未报废</option>
						<option value="1">已报废</option>
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
					<th>操作</th>
					<th>删除</th>
					<th>修改</th>
					<th style="color:red;">所属</th>
					<th>借出时间</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$i = 1;
				foreach ($datas as $row){
					echo '<tr><td>'.$i.'</td><td><img onclick="toChangeDevInfo()" class="dev_icon" id="icon_'.$row->id.'"src="http://'.$host.'/files/thumbnail/'.trim($row->path[0]).'"></img>';
					echo '</td><td id="label_'.$row->id.'">'.$row->device_name.'</td><td>'.$row->model.'</td><td>'.$row->theNum.'</td>';
					if($row->status == 0){
						echo '<td><input type="text" class="form-control" style="width:130px;" id="input_'.$row->id.'"></td>';
						echo '<td><button class="btn btn-sm btn-success" onclick="confirmBorrowed()" id="confirm_'.$row->id.'">借 出</button></td>';
						echo '<td><button type="button" class="btn btn-sm btn-danger"id="delete_'.$row->id.'" onclick="deleteDev()">删除</button></td>';
						echo '<td><button type="button" class="btn btn-sm btn-warning" id="change_'.$row->id.'" onclick="changeDevInfo()">修改</button></td>';
					}else if($row->status == 1){
						echo '<td id="input_'.$row->id.'" value="'.$row->borrower.'">'.$row->borrower.'</td>';
						echo '<td><button class="btn btn-sm btn-info" onclick="confirmBorrowed()" id="confirm_'.$row->id.'">通 过</button>
								</br><button style="margin-top:5px;" class="btn btn-sm btn-info" onclick="refuseBorrowed()" id="refuse_'.$row->id.'">拒 绝</button></td>';
						echo '<td><button type="button" class="btn btn-sm btn-danger"id="delete_'.$row->id.'" onclick="deleteDev()">删除</button></td>';
						echo '<td><button type="button" class="btn btn-sm btn-warning" id="change_'.$row->id.'" onclick="changeDevInfo()">修改</button></td>';
					}else if($row->status == 2){
						echo '<td><input type="text" disabled="disabled" class="form-control" style="width:130px;" value="'.$row->borrower.'" id="input_'.$row->id.'">
								<button type="button" class="btn btn-sm btn-warning" style="margin-top:5px;" id="modify_'.$row->id.'" onclick="modifyBorrower()">修改</button></td>';
						echo '<td><button class="btn btn-sm btn-danger" onclick="confirmReturned()" id="return_'.$row->id.'">归 还</button></td>';
						echo '<td><button type="button" class="btn btn-sm btn-danger"id="delete_'.$row->id.'" onclick="deleteDev()">删除</button></td>';
						echo '<td><button type="button" class="btn btn-sm btn-warning" id="change_'.$row->id.'" onclick="changeDevInfo()">修改</button></td>';
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

<script src="<?php echo base_url();?>static/devMS/js/manDevices/manDevices.js"></script>

<script type="text/javascript"> 
$(document).ready(function(){ 
	$("#dev_plateform").val("<?php echo $plateform;?>");
	$("#dev_brand").val("<?php echo $brand;?>");
	$("#dev_version").val("<?php echo $version;?>");
	$("#dev_status").val("<?php echo $status;?>");
	$("#dev_category").val("<?php echo $category;?>");
	$("#borrower").val("<?php echo $borrower;?>");
	$("#old_dev").val("<?php echo $old_dev;?>");
}); 
</script> 