<?php 
class ManPicMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	//获取设备的图片
	public function getDevPics($device_id){
		$queryString = 'select path from dev_imgs where device_id="'.$device_id.'"';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
	
	//获取数据库中的所有图片
	public function getAllPics(){
		$queryString = 'select path from dev_imgs';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
	
	//更具id获取设备图片
	public function getPicsFromId($id){
		$queryString = 'select path from dev_imgs where device_id='.$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
	
	//给某个设备添加图片
	function addPicToDev($id,$pic){
		$data = array(
				'device_id' => $id,
				'path' => $pic
		);
		$this->db->where('device_id', $id);
		$this->db->insert('dev_imgs', $data);
	}
	
	//删除某个设备的图片
	/**
	function delTheDevPic($id){
		$this->db->where('device_id', $id);
		$this->db->delete('dev_imgs');
	}
	*/
	//删除某个设备的图片
	function delTheDevPic($file){
		$this->db->where('path', $file);
		$this->db->delete('dev_imgs');
	}
	
	//获取数据库中有，但是file文件夹里面没有的图片
	function getExtImgsEcho(){
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
		return json_encode($extraArr);
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
}