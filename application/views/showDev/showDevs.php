<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];

//主机地址
$host = $_SERVER['HTTP_HOST'];

//获取查询的设备信息
$datas = $this->DevManageMod->getDevInfo();
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
		<table _border="1" style="width:100%;height:100px">
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
					<select id="dev_plateform" class="select_style form-control">
						<option value="all">all</option>
						<option value="android">4.4.4</option>
						<option value="ios">4.4.2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="label_style" class="label_style">状态：</label>
					<select id="dev_plateform" class="select_style form-control">
						<option value="all">all</option>
						<option value="android">已借出设备</option>
						<option value="ios">已分配设备</option>
						<option value="ios">申请中</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<div>
		<button class="btn btn-primary" style="width:100px;">查 询</button>
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


