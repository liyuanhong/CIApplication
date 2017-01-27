<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

$ses = isset($_POST['session'])?$_POST['session']:'';
$session = "";
if($ses == ""){
	echo "请登录...";
	exit();
}

$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了添加用户界面";
writeToLog($theTime,$who,$where,$doThings);

//$data = $this->ManUserMod->getUserAllInfoFromId($userId);

?>


<link href="<?php echo base_url();?>static/devMS/css/userMan/addUserPage.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/userMan/addUserPage.js"></script>


<div id="add_table_area">
<button type="button" class="btn btn-sm btn-success btn-back" onclick="javascript:history.back(-1);" style="margin:10px;">《返回</button>
	<table style="width:80%;height:100px;margin-left:20px;">
		<tr>
			<td>
				<label>用户名：</label>
				<input id="user_name" class="input_style form-control"></input>
			</td>
			<td>
				<label>登录名：</label>
				<input id="login_name" class="form-control input_style"></input>
			</td>
			<td>
				<label>密码：</label>
				<input id="password" class="input_style form-control"></input>
			</td>
		</tr>
		<tr>
			<td>
				<label>角色：</label>
				<select id="role"  class="input_style form-control" style="margin-left:15px;">
					<option value="0">超级管理员</option>
					<option value="1" selected = "selected">管理员</option>
					<option value="2">访客</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<button type="button" id="btn_add_user" style="width:180px;float:right;" class="btn btn-primary btn-primary" onclick="addUser()">添 加</button>
			</td>
		</tr>
	</table>
</div>