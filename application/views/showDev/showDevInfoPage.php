<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$id = $this->uri->segment(3, 0);
//echo $id;

//主机地址
$host = $_SERVER['HTTP_HOST'];

$data = $this->GetDevInfoMod->getDevInfoFromId($id);
//将返回的数组转换为对象
$jstr = json_encode($data);
$jdata = json_decode($jstr);
$jdata = $jdata->$id;
//echo $jstr."<br>";
//print_r($jdata);
//exit;
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了 ".$jdata->device_name." 的设备详情页面";
writeToLog($theTime,$who,$where,$doThings);


?>

<link href="<?php echo base_url();?>static/devMS/css/showDev/showDevInfoPage.css" rel="stylesheet">

<button type="button" class="btn btn-sm btn-success btn-back" onclick="javascript:history.back(-1);">《返回</button>
<div id="show_dev_inifo_page_div">
	<table class="table table-bordered">
		<tr class="info_table">
			<td>设备id: <?php echo $jdata->id;?></td><td>设备名: <?php echo $jdata->device_name;?></td><td>设备型号: <?php echo $jdata->model;?></td><td>设备编号: <?php echo $jdata->theNum;?></td><td>借出时间: <?php echo $jdata->borrow_time;?></td>
		</tr>
		
		<tr class="info_table">
			<td>状态: <?php if($jdata->status == 0){
				echo "无人借阅";
			}else if($jdata->status == 1){
				echo "申请中";
			}else if($jdata->status == 2){
				echo "已借出";
			};?>
			</td><td>借阅者: <?php echo $jdata->borrower;?></td><td>所属:  <?php echo $jdata->owner;?></td><td>系统版本: <?php echo $jdata->version;?></td><td>添加时间: <?php echo $jdata->add_time;?></td>
		</tr>
		
		<tr class="info_table">
			<td>平台: <?php echo $jdata->plateform;?></td><td>品牌: <?php echo $jdata->brand;?></td><td colspan="3">其他信息: <?php echo $jdata->other;?></td>
		</tr>
		<tr class="info_table">
			<td colspan="5">备注: <?php echo $jdata->comments;?></td>
		</tr>
	</table>
</div>



<link rel="stylesheet" href="<?php echo base_url();?>static/lib/slideLayer/reset.css">
<link rel="stylesheet" href="<?php echo base_url();?>static/lib/slideLayer/style.css">
<div id="slider" style="position: relative; overflow: hidden;">
	<ul class="slides clearfix" style="position: relative; width: 100%; right: 0%;">
		<?php 
		$imgs = $jdata->path;
		for($i = 0;$i < count($imgs);$i++){
			echo '<li style="width: 25%; float: left;"><div class="responsive" style="text-align:center;height:500px;"><img  style="height:500px;" src="';
			echo 'http://'.$host.'/ci/files/'.trim($imgs[$i]).'"></div></li>';
		}
		?>
	</ul>
	<ul class="controls" style="cursor: pointer;">
		<li style="position: absolute; margin-top: -36px;"><img src="<?php echo base_url();?>static/lib/slideLayer/prev.png" alt="previous"></li>
		<li style="position: absolute; margin-top: -36px;"><img src="<?php echo base_url();?>static/lib/slideLayer/next.png" alt="next"></li>
	</ul>
	<ul class="pagination" style="position: relative; left: 50%; bottom: 20px; margin: 0px 0px 0px -46.5px;">
		<?php 
		$imgs = $jdata->path;
		for($i = 0;$i < count($imgs);$i++){
			echo '<li class="" style="margin-right: 15px; float: left; cursor: pointer; width: 12px; height: 12px; border-radius: 9999px;"></li>';
		}
		?>
		
	</ul>
</div>

<script src="<?php echo base_url();?>static/lib/slideLayer/easySlider.js"></script>
<script type="text/javascript">
	$(function() {
		$("#slider").easySlider( {
			slideSpeed: 500,
			paginationSpacing: "15px",
			paginationDiameter: "12px",
			paginationPositionFromBottom: "20px",
			slidesClass: ".slides",
			controlsClass: ".controls",
			paginationClass: ".pagination"					
		});
	});
</script>

<div id="upload_img_div" style="margin-bottom: 100px;">

<div class="container" style="background-color:#cccccc;padding:10px;width:1000px;color:red;">
<h2 style="margin-bottom: 10px;">快来上传图片吧，最多可以上传两张图片哦，建议正面和反面各一张~</h2>
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
</div>


