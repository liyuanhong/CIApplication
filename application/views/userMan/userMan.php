<?php
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];

//主机地址
$host = $_SERVER['HTTP_HOST'];

$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了用户管理页面";
writeToLog($theTime,$who,$where,$doThings);

$ses = isset($_POST['session'])?$_POST['session']:'';
$session = "aa";
if($ses != ""){
	$session = $_POST['session'];
}

$userInfo = $this->ManUserMod->getUserInfoFromSession($session);
$login_name = $userInfo[0]->login_name;
$role = $userInfo[0]->role;


$users = $this->ManUserMod->getUsersInfo($role,$login_name);

?>

<link href="<?php echo base_url();?>static/devMS/css/userMan/userMan.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/userMan/userMan.js"></script>

<div style="width:100%;margin-top:5px;text-align:right">
	<button type="button" class="btn btn-success" style="margin-right: 100px;margin-bottom:10px;" onclick="toAddUserPage()">添 加 用 户</button>
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
		<?php 
			$i = 1;
			foreach ($users as $row){
				echo '<tr><td>'.$i.'</td><td><img onclick="toChangeUserInfoPage()" class="dev_icon" id="icon___'.$row->id.
				'"src="http://'.$host.'/ci/imgs/portrait/'.trim($row->icon).'"></img>';
				echo '</td><td id="label_'.$row->id.'">'.$row->user_name.'</td><td>'.$row->login_name.'</td><td>'.$row->password.'</td>';
				echo '</td><td id="label_'.$row->id.'">';
				if($row->role == 0){echo "超级管理员";}else if($row->role == 1){echo "管理员";}else if($row->role == 2){echo "访客";}
				echo '</td>';
				echo '<td><button type="button" class="btn btn-sm btn-danger" id="del_'.$row->id.'" onclick="delAnUser()">删 除</button></td>';
				echo '<td><button type="button" class="btn btn-sm btn-warning" id="change_'.$row->id.'" onclick="toChangeUserInfoPage()">修 改</button></td>';	
				$i++;
			}
		?>
		</tbody>
	</table>
</div>

