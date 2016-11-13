<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];


		
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了用户管理页面";
writeToLog($theTime,$who,$where,$doThings);

?>
<div style="width:100%;margin-top:5px;text-align:right">
	<button type="button" class="btn btn-success" style="margin-right: 100px;margin-bottom:10px;">添 加 用 户</button>
</div>
<div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>icon</th>
				<th>用户名</th>
				<th>登录名</th>
				<th>密码</th>
				<th>角色</th>
				<th>删除</th>
				<th>修改</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

