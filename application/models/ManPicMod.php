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
	
}