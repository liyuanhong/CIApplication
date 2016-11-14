<?php 
class ShowDevCnt extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ShowDevMod');
	}
	
	//条件查询符合要求的设备
	public function searchDevs(){
		$plateform = $_GET['plateform'];
		$brand = $_GET['brand'];
		$version = $_GET['version'];
		$status = $_GET['status'];
		$category = $_GET['category'];
		$borrower = $_GET['borrower'];
		
		echo json_encode($this->ShowDevMod->searchDevs($plateform,$brand,$version,$status,$category,$borrower));
	}
	
}

?>