<?php 
require dirname(__FILE__)."/../libraries/CI_Util.php";
require dirname(__FILE__)."/../libraries/CI_Log.php";
class ManPicCnt extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ManPicMod');
	}
	
	//获取某个设备的图片
	public function getDevPics(){
		$device_id = $_GET['device_id'];
		echo json_encode($this->ManPicMod->getDevPics($device_id));
	}
	
	//获取数据库中的所有图片
	public function getAllPics(){
		echo json_encode($this->ManPicMod->getAllPics());
	}
	
	//处理设备的图片（包括上传，删除，获取）
	public function dealDevPic(){
		error_reporting(E_ALL | E_STRICT);
		require('UploadHandler.php');
		$param = $this->uri->segment(4);
		$requestMethod = $_SERVER['REQUEST_METHOD'];
	
		if(empty($param)){
			$param = $this->uri->segment(3);
			if(empty($param)){
				$img = $_GET["file"]; //获取上传的文件名
				/** 调试用的代码，主要获取请求的url和文件名
				$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$myfile = fopen("testfile.txt", "w");
				fwrite($myfile, $requestUrl."\n");
				fwrite($myfile, $img."aaa\n");
				fclose($myfile);
				*/
				$upload_handler = new UploadHandler();    //上传某张图片
			}else{
				if($requestMethod == "GET"){
					//$upload_handler = new UploadHandler();   //返回所有的图片
				}else if($requestMethod == "POST"){
					$upload_handler = new UploadHandler();
				}else if($requestMethod == "DELETE"){       //删除特定图片
					$upload_handler = new UploadHandler();
				}
			}
		}
	}
	
	
	//获取数据库中有，但是file文件夹里面没有的图片,并打印
	function getExtImgsEcho(){
		//$allPics = $this->getAllPics();
		$dir = getcwd().'/files/thumbnail';
		$dbPics = json_encode($this->ManPicMod->getAllPics());
		$AdbPics = json_decode($dbPics);
		$dirPics = json_encode($this->getDirFiles($dir, $level=-1));
		$dirPics = json_decode($dirPics);
	
		$extraArr = array();
		for($j = 0;$j < count($dirPics);$j++){
			$picName = $dirPics[$j];
			if($this->thumbPicIsInDB($picName, $AdbPics)){
	
			}else{
				$extraArr[] = $picName;
			}
		}
		echo json_encode($extraArr);
	}
	//获取数据库中有，但是file文件夹里面没有的图片
	function getExtImgs(){
		//$allPics = $this->getAllPics();
		$dir = getcwd().'/files/thumbnail';
		$dbPics = json_encode($this->ManPicMod->getAllPics());
		$AdbPics = json_decode($dbPics);
		$dirPics = json_encode($this->getDirFiles($dir, $level=-1));
		$dirPics = json_decode($dirPics);
		//echo $dbPics."<br>";
		//echo json_encode($dirPics)."<br>";
		/**
		echo $dirPics;
		for($i = 0;$i < count($AdbPics);$i++){
			echo $AdbPics[$i]->path."<br>";
		}
		for($j = 0;$j < count($dirPics);$j++){
			echo $dirPics[$j]."<br>";
		}
		*/
		/**
		for($i = 0;$i < count($AdbPics);$i++){
			$isIn = in_array($AdbPics[$i]->path,$dirPics);
			echo $isIn."aaa<br>";
		}
		*/
		
		$extraArr = array();
		for($j = 0;$j < count($dirPics);$j++){
			$picName = $dirPics[$j];
			if($this->thumbPicIsInDB($picName, $AdbPics)){
				
			}else{
				$extraArr[] = $picName;
			}	
		}
		//echo json_encode($extraArr);
		return json_encode($extraArr);
	}
	
	//删除多余的图片
	function delExtImgs(){
		$host = $_SERVER['HTTP_HOST'];
		$arr = $this->getExtImgs();
		$arr = json_decode($arr);
		//echo getcwd();
		for($i=0;$i < count($arr);$i++){
			//$url = "http://".$host."/ci/index.php/Welcome/server/?file=".$arr[$i];
			//$this->callInterfaceCommon($url, "DELETE", "", "")."<br>";
			$img = "./files/".$arr[$i];
			$thumImg = "./files/thumbnail/".$arr[$i];
			unlink($img);
			unlink($thumImg);
		}
		echo "sucess";
	}
	
	//判断thumbnail中的图片是否在数据库中也有
	function thumbPicIsInDB($picName,$arr){
		for($i = 0;$i < count($arr);$i++){
			$picName1 = $arr[$i]->path;
			if(str_replace(" ","",$picName) == str_replace(" ","",$picName1)){
				//echo "----------------".'<br>';
				return true;
			}
		}
		return false;
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
	
	//删除某个设备的图片
	function delTheDevPic(){
		$file = $_POST['pic'];
		$this->ManPicMod->delTheDevPic($file);
		$img = "./files/".$file;
		$thumImg = "./files/thumbnail/".$file;
		unlink($img);
		unlink($thumImg);
		echo "sucess";
	}
	
	function callInterfaceCommon($URL,$type,$params,$headers){
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $URL); //发贴地址
		if($headers!=""){
			curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
		}else {
			curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type: text/json'));
		}
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		switch ($type){
			case "GET" : curl_setopt($ch, CURLOPT_HTTPGET, true);break;
			case "POST": curl_setopt($ch, CURLOPT_POST,true);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;
			case "PUT" : curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;
			case "DELETE":curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;
		}
		$file_contents = curl_exec($ch);//获得返回值
		return $file_contents;
		curl_close($ch);
	}
}