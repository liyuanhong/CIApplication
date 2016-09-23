<?php

?>
<!DOCTYPE html>
<html>
<head><title>bootstrap test</title>
</head>
<body>
<link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>static/devMS/css/index.css" rel="stylesheet">

<script src="<?php echo base_url();?>static/devMS/js/index.js"></script>

<div id="main">
	<div id="top_bar"></div>
	<div id="left_item">
		<div class="setting_item">
			<label class="setting_label menu_selected">设 备 查 询</label>
		</div>
		<div class="setting_item">
			<label class="setting_label">添 加 设 备</label>
		</div>
		<div class="setting_item">
			<label class="setting_label">管 理 设 备</label>
		</div>
		<div class="setting_item">
			<label class="setting_label">设 备 盘 点</label>
		</div>
		<div class="setting_item">
			<label class="setting_label">日 志 管 理</label>
		</div>
		<div class="setting_item">
			<label class="setting_label">用 户 管 理</label>
		</div>
	</div>
	<div id="right_content">
		 <?php $this->load->view('showDev/showDevs');?>
	</div>
</div>

</body>
</html>
</html>