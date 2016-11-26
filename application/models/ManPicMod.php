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
}