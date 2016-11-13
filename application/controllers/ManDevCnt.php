<?php 
class ManDevCnt extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ManDevMod');
	}
	
	//条件查询符合要求的设备
	public function searchDevs(){
		$plateform = $_GET['plateform'];
		$brand = $_GET['brand'];
		$version = $_GET['version'];
		$status = $_GET['status'];
		$category = $_GET['category'];
		$borrower = $_GET['borrower'];
		
		echo json_encode($this->ManDevMod->searchDevs($plateform,$brand,$version,$status,$category,$borrower));
	}
	
	
	//借出设备或确认申请设备
	function confirmBorrowed($id,$borrower){
		$id = $_GET['id'];
		$borrower = $_GET['borrower'];
		$this->ShowDevMod->confirmBorrowed($id,$borrower);
	}
	
	//归还设备
	function confirmReturned($id){
		$id = $_GET['id'];
		echo $this->ShowDevMod->confirmReturned($id,$borrower);
	}
	
	//删除设备
	function deleteDev($id){
		$id = $_GET['id'];
		echo $this->ShowDevMod->deleteDev($id,$borrower);
	}
	
	//修改设备
	function changeDevInfo(){
		echo $this->ShowDevMod->changeDevInfo($id,$borrower);
	}
	
	//修改签借人
	function changeBorrower($id,$borrower){
		$id = $_GET['id'];
		$borrower = $_GET['borrower'];
		echo $this->ShowDevMod->changeBorrower($id,$borrower);
	}
}

?>