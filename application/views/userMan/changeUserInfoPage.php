<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

//主机地址
$host = $_SERVER['HTTP_HOST'];
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了修改用户界面";
writeToLog($theTime,$who,$where,$doThings);

$userId = $this->uri->segment(3);
$data = $this->ManUserMod->getUserAllInfoFromId($userId);

?>


<link href="<?php echo base_url();?>static/devMS/css/userMan/changeUserInfoPage.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/userMan/changeUserInfoPage.js"></script>


<div id="modify_table_area">
<button type="button" class="btn btn-sm btn-success btn-back" onclick="javascript:history.back(-1);" style="margin:10px;">《返回</button>
	<table style="width:80%;height:100px;margin-left:20px;">
		<tr>
			<td>
				<label>登录名：</label>
				<input id="login_name" class="form-control input_style" disabled="disabled" value="<?php echo $data[0]->login_name;?>"></input>
			</td>
			<td>
				<label>用户名：</label>
				<input id="user_name" class="input_style form-control" disabled="disabled" value="<?php echo $data[0]->user_name;?>"></input>
			</td>
			<td>
				<label>密码：</label>
				<input id="password" class="input_style form-control" disabled="disabled" value="<?php echo $data[0]->password;?>"></input>
			</td>
		</tr>
		<tr>
			<td>
				<label>角色：</label>
				<select id="role"  class="input_style form-control" style="margin-left:15px;" disabled="disabled">
					<option value="0" <?php if($data[0]->role == 0){echo " selected='selected' ";}?>>超级管理员</option>
					<option value="1" <?php if($data[0]->role == 1){echo " selected='selected' ";}?>>管理员</option>
					<option value="2" <?php if($data[0]->role == 2){echo " selected='selected' ";}?>>访客</option>
				</select>
			</td>
			<td>
				<label>注册时间：</label>
				<input id="registe_time" class="input_style form-control" disabled="disabled" value="<?php echo $data[0]->registe_time;?>"></input>
			</td>
			<td>
				<label>上次登录：</label>
				<input id="login_time" class="input_style form-control" disabled="disabled" value="<?php echo $data[0]->login_time;?>"></input>
			</td>
		</tr>
		<tr>
			<td>
				<label>session：</label>
				<input id="session" class="input_style form-control" disabled="disabled" value="<?php echo $data[0]->session;?>"></input>
			</td>
			<td>
				<button type="button" id="btn_modify_<?php echo $userId?>" style="width:180px;float:right;" class="btn btn-primary btn-primary" onclick="changeUserInfo()">修 改</button>
			</td>
		</tr>
		<tr>
			<td colSpan="3">
				<laebl>设置头像：</laebl>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/default.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="default.png" onclick="modifyIcon()"></img>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/cat1.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="cat1.png" onclick="modifyIcon()"></img>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/baozhi1.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="baozhi1.png" onclick="modifyIcon()"></img>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/lufei1.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="lufei1.png" onclick="modifyIcon()"></img>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/nvhai1.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="nvhai1.png" onclick="modifyIcon()"></img>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/shishang1.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="shishang1.png" onclick="modifyIcon()"></img>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/meinv2.png" style="width:70px;height:70px;margin-left:10px;" class="user_img" id_val="<?php echo $data[0]->id;?>" val="meinv2.png" onclick="modifyIcon()"></img>
				
				<laebl style="margin-left:30px;">当前头像：</laebl>
				<img src="http://<?php echo $host?>/ci/imgs/portrait/<?php echo $data[0]->icon;?>" id="icon" style="width:70px;height:70px;margin-left:10px;"></img>
			</td>
		</tr>
	</table>
</div>