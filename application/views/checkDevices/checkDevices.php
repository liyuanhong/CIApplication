<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];
	
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了设备盘点页面";
writeToLog($theTime,$who,$where,$doThings);

?>
<div style="text-align: center;padding-top:10px;">
	<button type="button" class="btn btn-sm btn-primary" style="margin-right: 20px;">未盘点</button>
	<button type="button" class="btn btn-sm btn-success" style="margin-right: 20px;">已盘点</button>
	<button type="button" class="btn btn-sm btn-info" style="margin-right: 20px;">所有</button>
	<button type="button" class="btn btn-sm btn-warning" style="margin-right: 20px;">丢失</button>
	<button type="button" class="btn btn-sm btn-danger" style="margin-right: 20px;">重置</button>
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
		</table>
</div>