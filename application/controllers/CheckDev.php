<?php 
class CheckDev extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('CheckDevMod');
	}
	
	
	//获取没有被盘点的设备
	function getNoCheckDevs(){
		echo json_encode($this->CheckDevMod->getNoCheckDevs());
	}
	
	//获取盘点过的设备
	function getCheckedDevs(){
		echo json_encode($this->CheckDevMod->getCheckedDevs());
	}
	
	//获取所有设备
	function getAllDevs(){
		echo json_encode($this->CheckDevMod->getAllDevs());
	}
	
	//获取丢失的设备
	function getLostDevs(){
		echo json_encode($this->CheckDevMod->getLostDevs());
	}
	
	//重置设备状态
	function initializeDevs(){
		echo json_encode($this->CheckDevMod->initializeDevs());
	}
}
?>