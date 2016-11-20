<?php 
class ShowDevMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	//条件查询符合要求的设备
	public function searchDevs($plateform,$brand,$version,$status,$category,$borrower){
		//$queryString = "select a.id,a.device_name,a.model,a.theNum,a.owner,a.status,a.borrower,a.borrow_time,b.path from devices a,dev_imgs b where a.id=b.device_id";
		$queryString = "select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,path from devices left join dev_imgs on devices.id=dev_imgs.device_id";
		
		$queryString = $queryString.' where devices.id != "" ';
		if($plateform == "all"){
			
		}else{
			//$queryString = $queryString.' and a.plateform="'.$plateform.'"';
			$queryString = $queryString.' and plateform="'.$plateform.'"';
		}
		if($brand == "all"){
			
		}else{
			//$queryString = $queryString.' and a.brand="'.$brand.'"';
			$queryString = $queryString.' and brand="'.$brand.'"';
		}
		if($version == "all"){
			
		}else{
			//$queryString = $queryString.' and a.version like "'.$version.'"';
			$queryString = $queryString.' and version like "%'.$version.'%"';
		}
		if($status == "all"){
			
		}else{
			//$queryString = $queryString.' and a.status="'.$status.'"';
			$queryString = $queryString.' and status="'.$status.'"';
		}
		if($category == "all"){
			
		}else{
			//$queryString = $queryString.' and category="'.$category.'"';
			$queryString = $queryString.' and category="'.$category.'"';
		}
		if($borrower == ""){
			
		}else{
			//$queryString = $queryString.' and a.borrower like "%'.$borrower.'%"';
			$queryString = $queryString.' and borrower like "%'.$borrower.'%"';
		}
		
		
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
		
		
		
	}
}
?>