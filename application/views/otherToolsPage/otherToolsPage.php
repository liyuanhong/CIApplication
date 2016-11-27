<?php 


?>

<link href="<?php echo base_url();?>static/devMS/css/otherToolsPage/otherToolsPage.css" rel="stylesheet">
<script src="<?php echo base_url();?>static/devMS/js/otherToolsPage/otherToolsPage.js"></script>

<div style="width:100%;height:60px;background-color:#EEEEFF;">
	<button type="button" class="btn btn-success" id="showExtPics" onclick="showExtPics()" style="margin: 10px;">显示垃圾图片</button>
	<button type="button" class="btn btn-danger" id="delExtPics" onclick="delExtPics()" style="margin: 10px;">删除垃圾图片</button>
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
}
?>
</div>