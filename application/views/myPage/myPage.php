<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了我的页面";
writeToLog($theTime,$who,$where,$doThings);

//主机地址
$host = $_SERVER['HTTP_HOST'];

$borrower = getMemberFromIP();

$datas = $this->ShowDevMod->getDevByBorrower($borrower);

//print_r($datas);
//exit;
?>
<link href="<?php echo base_url();?>static/devMS/css/myPage/myPage.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/myPage/myPage.js"></script>

<div style="width: 100%;height:60px;padding-top:10px;background-color:#EEEEFF;">
<h3 style="text-align: center;margin-top:0px;">我借的设备</h3>
</div>
<div style="width: 100%;">
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
				<th>签借时间</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$i = 1;
			foreach ($datas as $row){
				echo '<tr><td>'.$i.'</td><td><img onclick="showDevInfo()" class="dev_icon" id="icon_'.$row->id.'"src="http://'.$host.'/files/thumbnail/'.trim($row->path[0]).'"></img>';
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