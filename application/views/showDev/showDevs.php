<?php

?>
<!DOCTYPE html>
<html>
<head><title>bootstrap test</title>
</head>
<body>
<link href="<?php echo base_url();?>static/devMS/css/showDev/showDevs.css" rel="stylesheet">

<div id="search_area">
	<div>
		<table _border="1" style="width:850px;height:100px">
			<tr>
				<td>
					<label class="label_style">平台：</label>
					<select id="dev_plateform" class="select_style">
						<option value="all">all</option>
						<option value="android">android</option>
						<option value="ios">ios</option>
					</select>
				</td>
				<td>
					<label class="label_style">品牌：</label>
					<select id="dev_brand" class="select_style">
						<option value="all">all</option>
						<option value="三星">三星</option>
						<option value="小米">小米</option>
						<option value="华为">华为</option>
						<option value="魅族">魅族</option>
					</select>
				</td>
				<td>
					<label class="label_style">系统版本：</label>
					<select id="dev_plateform" class="select_style">
						<option value="all">all</option>
						<option value="android">4.4.4</option>
						<option value="ios">4.4.2</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label class="label_style" class="label_style">状态：</label>
					<select id="dev_plateform" class="select_style">
						<option value="all">all</option>
						<option value="android">已借出设备</option>
						<option value="ios">已分配设备</option>
						<option value="ios">申请中</option>
					</select>
				</td>
			</tr>
		</table>
	</div>
	<div>
		<button class="btn btn-primary" style="width:100px;">查 询</button>
	</div>

	
</div>

</body>
</html>
</html>