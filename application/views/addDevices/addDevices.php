<?php 

?>

<link href="<?php echo base_url();?>static/devMS/css/addDevices/addDevices.css" rel="stylesheet">
<div id="add_devices">
	<div>
		<table>
			<tr>
				<td>
					<label>设备名：</label>
					<input class="form-control input_style"</input>
				</td>
				<td>
					<label>型号：</label>
					<input class="input_style form-control"></input>
				</td>
				<td>
					<label>编号：</label>
					<input class="input_style form-control"></input>
				</td>
			</tr>
			<tr>
				<td>
					<label>属性：</label>
					<select id="dev_plateform"  class="input_style form-control" style="margin-left:15px;">
						<option value="all">android</option>
						<option value="ios">ios</option>
					</select>
				</td>
				<td>
					<label>所属：</label>
					<input class="input_style form-control"></input>
				</td>
			</tr>
			<tr>
				<td colSpan="2">
					<label>其他：</label>
					<input class="input_style form-control" style="margin-left:15px;width:400px;"></input>
				</td>
			</tr>
			<tr>
				<td colSpan="3">
					<label style=";float:left;">备注：</label>
					<textArea id="comments" class="input_style form-control" style="margin-left:20px;width:400px;height:150px;"></textArea>
				</td>
			</tr>
			<tr>
				<td colSpan="3" style="background-color:#cccccc;">
					<label>照片：</label>
					<button type="button" class="btn btn-sm btn-success" sytle="margin-left:10px;">上传图片</button>
					<label style="margin-left:10px;position:absolute;padding-top:5px;">the picture path</label>
				</td>
			</tr>
			<tr>
				<td colSpan="3" _style="background-color:#cccccc;">				
					<button type="button" class="btn btn-primary">添 加 设 备</button>
				</td>
			</tr>
		</table>	
	</div>
		
	

</div>