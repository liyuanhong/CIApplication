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
$doThings = "访问了查看管理员页面";
writeToLog($theTime,$who,$where,$doThings);

$users = $this->ManUserMod->getManagerInfo();

?>

<link href="<?php echo base_url();?>static/devMS/css/userMan/userMan.css" rel="stylesheet">
<div style="width:100%;margin-top:5px;text-align:right">
</div>
<div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id</th>
				<th>icon</th>
				<th>用户名</th>
				<th>角色</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$i = 1;
			foreach ($users as $row){
				echo '<tr><td>'.$i.'</td><td><img  class="dev_icon" id="icon___'.$row->id.
				'"src="http://'.$host.'/ci/imgs/portrait/'.trim($row->icon).'"></img>';
				echo '</td><td id="label_'.$row->id.'">'.$row->user_name.'</td>';
				echo '</td><td id="label_'.$row->id.'">';
				if($row->role == 0){echo "超级管理员";}else if($row->role == 1){echo "管理员";}else if($row->role == 2){echo "访客";}
				echo '</td>';
				$i++;
			}
		?>
		</tbody>
	</table>
</div>

