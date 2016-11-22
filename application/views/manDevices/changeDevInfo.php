<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";
$id = $this->uri->segment(3, 0);
//echo $id;

$data = $this->GetDevInfoMod->getDevInfoFromId($id);
//将返回的数组转换为对象
$jstr = json_encode($data);
$jdata = json_decode($jstr);
//echo $jstr."<br>";


$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了 ".$jdata[0]->device_name." 的修改设备信息页面";
writeToLog($theTime,$who,$where,$doThings);
?>

<button type="button" class="btn btn-sm btn-success btn-back" onclick="javascript:history.back(-1);">《返回</button>
<link href="<?php echo base_url();?>static/devMS/css/manDevices/changeDevInfo.css" rel="stylesheet"/>
<div id="add_devices">
	<div>
	<table>
			<tr>
				<td>
					<label>设备名：</label>
					<input id="dev_name" class="form-control input_style"></input>
				</td>
				<td>
					<label>型号：</label>
					<input id="dev_model" class="input_style form-control"></input>
				</td>
				<td>
					<label>编号：</label>
					<input id="dev_num" class="input_style form-control"></input>
				</td>
			</tr>
			<tr>
				<td>
					<label>平台：</label>
					<select id="dev_plateform"  class="input_style form-control" style="margin-left:15px;">
						<option value="android">android</option>
						<option value="ios">ios</option>
					</select>
				</td>
				<td>
					<label>所属：</label>
					<input id="dev_owner" class="input_style form-control"></input>
				</td>
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
				<td>
					<label>分类：</label>
					<select id="dev_category"  class="input_style form-control" style="margin-left:0px;">
						<option value="手机和平板" selected="selected">手机和平板</option>
						<option value="手机">手机</option>
						<option value="平板">平板</option>
						<option value="其他">其他</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colSpan="2">
					<label>其他：</label>
					<input id="dev_other" class="input_style form-control" style="margin-left:15px;width:400px;"></input>
				</td>
			</tr>
			<tr>
				<td colSpan="3">
					<label style=";float:left;">备注：</label>
					<textArea id="dev_comments" class="input_style form-control" style="margin-left:20px;width:400px;height:150px;"></textArea>
				</td>
			</tr>
			<tr>
				<td colSpan="3" style="background-color:#cccccc;padding:0px;">
					
				</td>
			</tr>
			<tr>
				<td colSpan="3" _style="background-color:#cccccc;padding:0px;">				
					<button id="dev_add_but" type="button" class="btn btn-primary">编 辑</button>
					<button id="test" type="button" class="btn btn-primary">提 交</button>
				</td>
			</tr>
		</table>	
	</div>


</div>

