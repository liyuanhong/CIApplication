<?php
$url =  $_SERVER['PHP_SELF'];
//php中以/分割字符串
$arr = explode("/",$url);
?>

<link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url();?>static/devMS/css/index.css" rel="stylesheet">

<script src="<?php echo base_url();?>static/devMS/js/index.js"></script>
<script src="<?php echo base_url();?>static/devMS/js/jquery-3.1.1.min.js"></script>

<div id="main">
	<div id="top_bar">
		<label style="color:white;font-size:20px;margin-left:45px;margin-top:8px;">设备管理系统</label>
		<div>
			<label id="login_lagel" class="login_label" onclick="jumpToLoginPage()">登录</label>
			<!--<label style="color:white;margin-left:20px;" class="login_label">|</label>-->
			<label id="register_label" class="login_label" onclick="jumpToRegisterPage()">注册</label>
		</div>
	</div>
	
	<div style="width: 100%;height:100%;">
		<div id="left_item">
			<div class="setting_item">
				<label id = "searchDevices" class="setting_label <?php if($arr[4]=='searchDevices'){echo 'menu_selected';} ?>" onclick="changeMenu(event)">设 备 查 询</label>
			</div>
			<div class="setting_item">
				<label id = "addDevices" class="setting_label <?php if($arr[4]=='addDevices'){echo 'menu_selected';} ?>" onclick="changeMenu(event)">添 加 设 备</label>
			</div>
			<div class="setting_item">
				<label id = "manDevices" class="setting_label <?php if($arr[4]=='manDevices'){echo 'menu_selected';} ?>" onclick="changeMenu(event)" >管 理 设 备</label>
			</div>
			<div class="setting_item">
				<label id = "checkDevices" class="setting_label <?php if($arr[4]=='checkDevices'){echo 'menu_selected';} ?>" onclick="changeMenu(event)">设 备 盘 点</label>
			</div>
			<div class="setting_item">
				<label id = "logMan"class="setting_label <?php if($arr[4]=='logMan'){echo 'menu_selected';} ?>" onclick="changeMenu(event)">日 志 管 理</label>
			</div>
			<div class="setting_item">
				<label id = "userMan" class="setting_label <?php if($arr[4]=='userMan'){echo 'menu_selected';} ?>" onclick="changeMenu(event)">用 户 管 理</label>
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
				//$this->load->view('manDevices/manDevices');
			}else if($arr[4]=='checkDevices'){
				if(count($arr) == 5){
					$this->load->view('checkDevices/checkDevices');
				}else if(count($arr) == 6){
					if($arr[5] == "checkeded" || $arr[5] == "no_checked" || $arr[5] == "all_devs" || $arr[5] == "lost_devs" || $arr[5] == "initaillize"){
						$this->load->view('checkDevices/checkDevices');
					}else{
						$this->load->view('checkDevices/showDevInfoPage');
					}
					//$this->load->view('checkDevices/showDevInfoPage');
				}
				//$this->load->view('checkDevices/checkDevices');
			}else if($arr[4]=='logMan'){
				$this->load->view('logMan/logMan');
			}else if($arr[4]=='userMan'){
				$this->load->view('userMan/userMan');
			}
			?>
		</div>
	</div>
</div>

