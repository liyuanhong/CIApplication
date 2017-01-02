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
$doThings = "访问了添加设备页面";
writeToLog($theTime,$who,$where,$doThings);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>addDevices</title>
	</head>
	<body>
		<script src="<?php echo base_url();?>static/devMS/js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url();?>static/devMS/js/jquery.cookie.js"></script>
		<link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="<?php echo base_url();?>static/devMS/js/addDevices/addDevices.js"></script>
		<div id="add_devices" class="page-content">
			<div>
			<table>
					<tr>
						<td>
							<label>设备名：</label>
							<input id="dev_name" class="form-control input_style"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>型号：</label>
							<input id="dev_model" class="input_style form-control"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>编号：</label>
							<input id="dev_num" class="input_style form-control"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>平台：</label>
							<select id="dev_plateform"  class="input_style form-control">
								<option value="android">android</option>
								<option value="ios">ios</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>所属：</label>
							<input id="dev_owner" class="input_style form-control"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>品牌：</label>
							<input id="dev_brand" class="input_style form-control"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="label_style">系版本：</label>
							<input id="dev_version" class="form-control input_style"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>分类：</label>
							<select id="dev_category"  class="input_style form-control">
								<option value="手机">手机</option>
								<option value="平板">平板</option>
								<option value="其他">其他</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label>其他：</label>
							<input id="dev_other" class="input_style form-control"></input>
						</td>
					</tr>
					<tr>
						<td colSpan="2">
							<label>MAC地址：</label>
							<input id="dev_other" class="input_style form-control"></input>
						</td>
					</tr>
					<tr>
						<td>
							<label style=";float:left;">备注：</label>
							<textArea id="dev_comments" class="input_style form-control"></textArea>
						</td>
					</tr>
						
					<tr>
						<td>				
							<button id="dev_add_but" type="button" class="btn btn-primary">添 加 设 备</button>
						</td>
					</tr>
				</table>	
			</div>
		
		
		</div>

	</body>
</html>


