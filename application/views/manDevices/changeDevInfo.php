<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$id = $this->uri->segment(3, 0);
//echo $id;
//主机地址
$host = $_SERVER['HTTP_HOST'];

$data = $this->GetDevInfoMod->getDevInfoFromId($id);
$pics = $this->ManPicMod->getPicsFromId($id);

//print_r($pics);
//exit;


//将返回的数组转换为对象
$jstr = json_encode($data);
$jdata = json_decode($jstr);
$jdata = $jdata->$id;
$data = $jdata;
//echo $jstr."<br>";


$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了 ".$jdata->device_name." 的修改设备信息页面";
writeToLog($theTime,$who,$where,$doThings);
?>

<button type="button" class="btn btn-sm btn-success btn-back" onclick="javascript:history.back(-1);">《返回</button>
<link href="<?php echo base_url();?>static/devMS/css/manDevices/changeDevInfo.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>static/devMS/js/manDevices/changeDevInfo.js"></script>
<div id="add_devices">
	<div>
	<table>
			<tr>
				<td>
					<label>设备名：</label>
					<input id="dev_name" class="form-control input_style" disabled="disabled" value="<?php echo $data->device_name;?>"></input>
				</td>
				<td>
					<label>型号：</label>
					<input id="dev_model" class="input_style form-control" disabled="disabled" value="<?php echo $data->model;?>"></input>
				</td>
				<td>
					<label>编号：</label>
					<input id="dev_num" class="input_style form-control" disabled="disabled" value="<?php echo $data->theNum;?>"></input>
				</td>
			</tr>
			<tr>
				<td>
					<label>平台：</label>
					<select id="dev_plateform"  class="input_style form-control" style="margin-left:15px;" disabled="disabled">
						<option value="android" <?php if($data->plateform == "android"){echo " selected='selected' ";}?>>android</option>
						<option value="ios" <?php if($data->plateform == "ios"){echo " selected='selected' ";}?>>ios</option>
					</select>
				</td>
				<td>
					<label>所属：</label>
					<input id="dev_owner" class="input_style form-control" disabled="disabled" value="<?php echo $data->owner;?>"></input>
				</td>
				<td>
					<label>品牌：</label>
					<input id="dev_brand" class="input_style form-control" disabled="disabled" value="<?php echo $data->brand;?>"></input>
				</td>
			</tr>
			<tr>
				<td>
					<label class="label_style">系版本：</label>
					<input id="dev_version" class="form-control input_style" disabled="disabled" value="<?php echo $data->version;?>"></input>
				</td>
				<td>
					<label>分类：</label>
					<select id="dev_category"  class="input_style form-control" style="margin-left:0px;" disabled="disabled">
						<option value="手机" <?php if($data->category == "手机"){echo " selected='selected' ";}?>>手机</option>
						<option value="平板" <?php if($data->category == "平板"){echo " selected='selected' ";}?>>平板</option>
						<option value="其他" <?php if($data->category == "其他"){echo " selected='selected' ";}?>>其他</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colSpan="2">
					<label>其他：</label>
					<input id="dev_other" class="input_style form-control" style="margin-left:15px;width:400px;" disabled="disabled"  value="<?php echo $data->other;?>"></input>
				</td>
			</tr>
			<tr>
				<td colSpan="3">
					<label style=";float:left;">备注：</label>
					<textArea id="dev_comments" class="input_style form-control" style="margin-left:20px;width:400px;height:150px;" disabled="disabled" ><?php echo $data->comments;?></textArea>
				</td>
			</tr>
			<tr>
				<td colSpan="3" style="background-color:#cccccc;padding:0px;">
					
				</td>
			</tr>
			<tr>
				<td colSpan="3" _style="background-color:#cccccc;padding:0px;">				
					<button id="change_<?php echo $id;?>" type="button" class="btn btn-primary" onclick="changeDevInfo()">编 辑</button>
<!-- 					<button id="test" type="button" class="btn btn-primary">提 交</button> -->
				</td>
			</tr>
		</table>	
	</div>
</div>

<div id="image_show">
	<table class="table table-striped" id="table_image">
			<?php 
			for($i=0;$i < count($pics);$i++){
				echo '<tr><td><img  style="float:left;margin-left:30px;" src="';
				echo "http://".$host."/ci/files/thumbnail/".trim($pics[$i]->path);
				echo '"><button type="button" class="btn btn-sm btn-danger"id="delete_'.trim($pics[$i]->path).'" onclick="deleteDevImg()" style="float:right;margin-right:500px;width:70px;margin-top:20px;">删除</button></td></tr>';
			}
			?>
			<tr>
				<td colsSpan="1" style="background-color:#cccccc;padding:0px;">
					<div class="container" style="padding-top:5px;">
					<form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data" >
					<!-- Redirect browsers with JavaScript disabled to the origin page -->
					<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
					<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
					<div class="row fileupload-buttonbar">
						<div class="col-lg-7" style="padding-top:0px;width:720px;">
							<!-- The fileinput-button span is used to style the file input field as button -->
							<span class="btn btn-success fileinput-button">
								<input type="file" name="files[]" multiple>
							</span>
							<button type="submit" class="btn btn-primary start">
								<i class="glyphicon glyphicon-upload"></i>
								<span>Start upload</span>
							</button>
							<button type="reset" class="btn btn-warning cancel">
								<i class="glyphicon glyphicon-ban-circle"></i>
								<span>Cancel upload</span>
							</button>
							<button type="button" class="btn btn-danger delete">
								<i class="glyphicon glyphicon-trash"></i>
								<span>Delete</span>
							</button>
							<input type="checkbox" class="toggle">
							<span class="fileupload-process"></span>
						</div>
					<table role="presentation" class="table table-striped" style="margin-top:40px;margin-bottom:5px;"><tbody class="files"></tbody></table>
				</form>
				<br>
				
			</div>
			
				<script id="template-upload" type="text/x-tmpl">
				{% for (var i=0, file; file=o.files[i]; i++) { %}
					<tr class="template-upload fade">
						<td>
							<span class="preview"></span>
						</td>
						<td>
							<p class="name">{%=file.name%}</p>
							<strong class="error text-danger"></strong>
						</td>
						<td>
							<p class="size">Processing...</p>
							<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
						</td>
						<td>
							{% if (!i && !o.options.autoUpload) { %}
								<button class="btn btn-primary start" disabled>
									<i class="glyphicon glyphicon-upload"></i>
									<span>Start</span>
								</button>
							{% } %}
							{% if (!i) { %}
								<button class="btn btn-warning cancel">
									<i class="glyphicon glyphicon-ban-circle"></i>
									<span>Cancel</span>
								</button>
							{% } %}
						</td>
					</tr>
				{% } %}
				</script>
				<!-- The template to display files available for download -->
				<script id="template-download" type="text/x-tmpl">
				{% for (var i=0, file; file=o.files[i]; i++) { %}
					<tr class="template-download fade">
						<td>
							<span class="preview">
								{% if (file.thumbnailUrl) { %}
									<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
								{% } %}
							</span>
						</td>
						<td>
							<p class="name">
								{% if (file.url) { %}
									<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
								{% } else { %}
									<span>{%=file.name%}</span>
								{% } %}
							</p>
							{% if (file.error) { %}
								<div><span class="label label-danger">Error</span> {%=file.error%}</div>
							{% } %}
						</td>
						<td>
							<span class="size">{%=o.formatFileSize(file.size)%}</span>
						</td>
						<td>
							{% if (file.deleteUrl) { %}
								<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl.split('?')[0] + 'index.php/Welcome/server/?' + file.deleteUrl.split('?')[1]%}"{% if (file.deleteWithCredentials) { %} 
								data-xhr-fields='{"withCredentials":true}'{% } %}>
									<i class="glyphicon glyphicon-trash"></i>
									<span>Delete</span>
								</button>
								<input type="checkbox" name="delete" value="1" class="toggle">
							{% } else { %}
								<button class="btn btn-warning cancel">
									<i class="glyphicon glyphicon-ban-circle"></i>
									<span>Cancel</span>
								</button>
							{% } %}
						</td>
					</tr>
				{% } %}
				</script>
				</td>
			</tr>
	</table>
</div>


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url();?>static/dist/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo base_url();?>static/dist/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url();?>static/dist/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url();?>static/dist/js/main.js"></script>

