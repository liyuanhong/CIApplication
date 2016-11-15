<?php 
require dirname(__FILE__)."/../libraries/CI_Log.php";
defined('BASEPATH') OR exit('No direct script access allowed');
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
	function confirmBorrowed(){
		$id = $_GET['id'];
		$borrower = $_GET['borrower'];
		$borrow_time = date('Y-m-d H:i:s',time());
		echo $this->ManDevMod->confirmBorrowed($id,$borrower,$borrow_time);
	}
	
	//归还设备
	function confirmReturned(){
		$id = $_GET['id'];
		$borrower = $_GET['borrower'];
		
		$data = $this->ManDevMod->getDevNum($id);
		$jd = json_encode($data);
		$devNum = json_decode($jd)[0]->theNum;
		$devName = json_decode($jd)[0]->device_name;
		
		
		//写入操作日志
		$theTime = date('y-m-d h:i:s',time());
		$who = "李明";
		$where = "从".$_SERVER['HTTP_HOST'];
		$doThings = "确认 ".$borrower." 归还了设备：".$devName.'--编号：'.$devNum;
		writeToLog($theTime,$who,$where,$doThings);
		
		echo $this->ManDevMod->confirmReturned($id);
		
	}
	
	//删除设备
	function deleteDev(){
		$id = $_GET['id'];
		
		$data = $this->ManDevMod->getDevNum($id);
		$jd = json_encode($data);
		$devNum = json_decode($jd)[0]->theNum;
		$devName = json_decode($jd)[0]->device_name;
		
		//写入操作日志
		$theTime = date('y-m-d h:i:s',time());
		$who = "李明";
		$where = "从".$_SERVER['HTTP_HOST'];
		$doThings = "删除了设备：".$devName.'--编号：'.$devNum;
		writeToLog($theTime,$who,$where,$doThings);
		
		echo $this->ManDevMod->deleteDev($id);
	}
	
	//修改设备
	function changeDevInfo(){
		echo $this->ManDevMod->changeDevInfo($id,$borrower);
	}
	
	//修改签借人
	function changeBorrower(){
		$id = $_GET['id'];
		$borrower = $_GET['borrower'];
		
		$data = $this->ManDevMod->getDevNum($id);
		$jd = json_encode($data);
		$devNum = json_decode($jd)[0]->theNum;
		$devName = json_decode($jd)[0]->device_name;
		$borrowerOld = json_decode($jd)[0]->borrower;
		
		//写入操作日志
		$theTime = date('y-m-d h:i:s',time());
		$who = "李明";
		$where = "从".$_SERVER['HTTP_HOST'];
		$doThings = "将签借人由: ".$borrowerOld." 改为：".$borrower."  ---".$devName.'--编号：'.$devNum;
		writeToLog($theTime,$who,$where,$doThings);
		
		echo $this->ManDevMod->changeBorrower($id,$borrower);
	}
}

?>