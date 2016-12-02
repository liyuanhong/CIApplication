<?php
$ses = isset($_POST['session'])?$_POST['session']:'';
$session = "";
if($ses != ""){
	$session = $_POST['session'];
}

$url =  $_SERVER['PHP_SELF'];
//php中以/分割字符串
$arr = explode("/",$url);

$isLogin = $this->ManUserMod->isLogin($session);

?>

<script src="<?php echo base_url();?>static/devMS/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>static/devMS/js/jquery.cookie.js"></script>
<link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>static/devMS/css/index.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/index.js"></script>


<div id="main">
	<div id="top_bar">
		<label style="color:white;font-size:20px;margin-left:45px;margin-top:8px;">设备管理系统</label>
		<div>
			<?php if($isLogin == 1){
				echo '<label id="logout_lagel" class="login_label" onclick="logout()">退出</label>';
				echo '<label style="font-size: 14px;padding-top: 10px;color: #31B0F4;margin-left: 0px;height: 100%;width: 110px;background-color: #1A4FA3;text-align: center;" >welcome~</label>';
			}else{
				echo '<label id="login_lagel" class="login_label" onclick="jumpToLoginPage()">登录</label>';
				echo '<label id="register_label" class="login_label" onclick="jumpToRegisterPage()">注册</label>';
			}
			
			?>
		</div>
	</div>
	
	<div style="width: 100%;height:100%;">
		<div id="left_item">
			<div class="setting_item">
				<label id = "searchDevices" class="setting_label <?php if($arr[4]=='searchDevices'){echo 'menu_selected';} ?>" onclick="changeMenu(event)">设 备 查 询</label>
			</div>
			<?php if($isLogin == 1){
				echo '<div class="setting_item">';
				echo '<label id = "addDevices" class="setting_label';if($arr[4]=="addDevices"){echo ' menu_selected';} echo '" onclick="changeMenu(event)">添 加 设 备</label>';
				echo '</div>';
			}
			?>
			<?php if($isLogin == 1){
				echo '<div class="setting_item">';
				echo '<label id = "manDevices" class="setting_label';if($arr[4]=="manDevices"){echo ' menu_selected';}echo '" onclick="changeMenu(event)" >管 理 设 备</label>';
				echo '</div>';
			}
			
			?>
			<?php if($isLogin == 1){
				echo '<div class="setting_item">';
				echo '<label id = "checkDevices" class="setting_label';if($arr[4]=="checkDevices"){echo " menu_selected";} echo '" onclick="changeMenu(event)">设 备 盘 点</label>';
				echo '</div>';
			}
			?>
			<?php if($isLogin == 1){
				echo '<div class="setting_item">';
				echo '<label id = "logMan"class="setting_label';if($arr[4]=='logMan'){echo ' menu_selected';}echo '" onclick="changeMenu(event)">日 志 管 理</label>';
				echo '</div>';
			}
			?>
			<?php if($isLogin == 1){
				echo '<div class="setting_item">';
				echo '<label id = "userMan" class="setting_label'; if($arr[4]=='userMan'){echo ' menu_selected';} echo '" onclick="changeMenu(event)">用 户 管 理</label>';
				echo '</div>';
			}
			?>
			<?php if($isLogin == 0){
				echo '<div class="setting_item">';
				echo '<label id = "showManager" class="setting_label'; if($arr[4]=='showManager'){echo ' menu_selected';} echo '" onclick="changeMenu(event)">查 看 管 理 员</label>';
				echo '</div>';
			}
			?>
			<div class="setting_item">
				<label id = "myPage" class="setting_label <?php if($arr[4]=='myPage'){echo ' menu_selected';} ?>" onclick="changeMenu(event)">我 的 页 面</label>
			</div>
			<?php if($isLogin == 1){
				echo '<div class="setting_item">';
				echo '<label id = "otherToolsPage" class="setting_label';if($arr[4]=='otherToolsPage'){echo ' menu_selected';} echo '" onclick="changeMenu(event)">附 加 功 能</label>';
				echo '</div>';
			}
			?>
			<div class="setting_item">
				<label id = "aboutPage" class="setting_label <?php if($arr[4]=='aboutPage'){echo ' menu_selected';} ?>" onclick="changeMenu(event)">关 于 系 统</label>
			</div>
		</div>
		<div id="right_content">
			<?php 
			if($arr[4]=='searchDevices'){
				if(count($arr) == 5){
					$this->load->view('showDev/showDevs');
				}else if(count($arr) == 6){
					$this->load->view('showDev/showDevInfoPage');
				}
			}else if($arr[4]=='addDevices'){
				$this->load->view('addDevices/addDevices');
			}else if($arr[4]=='manDevices'){
				if(count($arr) == 5){
					$this->load->view('manDevices/manDevices');
				}else if(count($arr) == 6){
					$this->load->view('manDevices/changeDevInfo');
				}
			}else if($arr[4]=='checkDevices'){
				if(count($arr) == 5){
					$this->load->view('checkDevices/checkDevices');
				}else if(count($arr) == 6){
					if($arr[5] == "checkeded" || $arr[5] == "no_checked" || $arr[5] == "all_devs" || $arr[5] == "lost_devs" || $arr[5] == "initaillize" || $arr[5] == "old_devs" || $arr[5] == "available_devs"){
						$this->load->view('checkDevices/checkDevices');
					}else{
						$this->load->view('checkDevices/showDevInfoPage');
					}
				}
			}else if($arr[4]=='logMan'){
				$this->load->view('logMan/logMan');
			}else if($arr[4]=='userMan'){
				if(count($arr) == 5){
					$this->load->view('userMan/userMan');
				}else if(count($arr) == 6){
					if($arr[5] == "addUserPage"){
						$this->load->view('userMan/addUserPage');
					}else{
						$this->load->view('userMan/changeUserInfoPage');
					}
				}
				
				
			}else if($arr[4]=='myPage'){
				$this->load->view('myPage/myPage');
			}else if($arr[4]=='otherToolsPage'){
				$this->load->view('otherToolsPage/otherToolsPage');
			}else if($arr[4]=='aboutPage'){
				$this->load->view('aboutPage/aboutPage');
			}else if($arr[4]=='showManager'){
				$this->load->view('userMan/showManager');
			}
			?>
		</div>
	</div>
</div>

