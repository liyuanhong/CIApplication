<?php 
require dirname(__FILE__)."/../../libraries/CI_Util.php";
require dirname(__FILE__)."/../../libraries/CI_Log.php";

$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER["REMOTE_ADDR"];
$doThings = "访问了附加功能页面";
writeToLog($theTime,$who,$where,$doThings);

?>

<link href="<?php echo base_url();?>static/devMS/css/otherToolsPage/otherToolsPage.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/otherToolsPage/otherToolsPage.js"></script>

<div style="width:100%;height:60px;background-color:#EEEEFF;">
	<button type="button" class="btn btn-success" id="showExtPics" onclick="showExtPics()" style="margin: 10px;">显示垃圾图片</button>
	<button type="button" class="btn btn-danger" id="delExtPics" onclick="delExtPics()" style="margin: 10px;">删除垃圾图片</button>
	<button type="button" class="btn btn-success" id="delExtPics" onclick="showPicCnt()" style="margin: 10px;">图片数量对比</button>
</div>

<div>
<?php 
if($this->uri->segment(3) == "getExtImgsEcho"){
	$arr = json_decode($this->ManPicMod->getExtImgsEcho());
	if(count($arr) == 0){
		echo "没有垃圾图片";
	}else{
		for($i=0;$i < count($arr);$i++){
			echo $arr[$i]."<br>";
		}
	}
}else if($this->uri->segment(3) == "showPicCnt"){
		$dir = getcwd().'/files/thumbnail';
		$dirPics = getDirFiles($dir, $level=-1);
		$dbPicCnt = count($this->ManPicMod->getAllPics());
		$dirPicCnt = count($dirPics);
		echo "数据库图片数：".$dbPicCnt."   实际图片数：".$dirPicCnt;
}

//获取thumbnail目录下的所有图片文件
function getDirFiles($dir, $level=-1)
{
	if ($level == 0) {
		return array();
	}
	if (is_file($dir)) {
		return array($dir);
	}
	$files = array();
	if (is_dir($dir) && ($dir_p = opendir($dir))) {
		$ds = DIRECTORY_SEPARATOR;
		while (($filename = readdir($dir_p)) !== false) {
			if ($filename=='.' || $filename=='..') { continue; }
			$filetype = filetype($dir.$ds.$filename);
			if ($filetype == 'dir') {
				//$files = array_merge($files, getDirFiles($dir.$ds.$filename, $level==-1?-1:$level-1));
				$files = array_merge($files, getDirFiles($filename, $level==-1?-1:$level-1));
			} elseif ($filetype == 'file') {
				//$files[] = $dir.$ds.$filename;
				$files[] = $filename;
			}
		}
		closedir($dir_p);
	}
	return $files;
}
?>
</div>