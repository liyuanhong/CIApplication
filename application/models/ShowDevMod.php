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
		$queryString = "select a.id,a.device_name,a.model,a.theNum,a.owner,a.status,a.borrower,a.borrow_time,b.path from devices a,dev_imgs b where a.id=b.device_id";
		
		if($plateform == "all"){
			
		}else{
			$queryString = $queryString.' and a.plateform="'.$plateform.'"';
		}
		if($brand == "all"){
			
		}else{
			$queryString = $queryString.' and a.brand="'.$brand.'"';
		}
		if($version == "all"){
			
		}else{
			$queryString = $queryString.' and a.version like "'.$version.'"';
		}
		if($status == "all"){
			
		}else{
			$queryString = $queryString.' and a.status="'.$status.'"';
		}
		if($category == "all"){
			
		}else{
			$queryString = $queryString.' and a.category="'.$category.'"';
		}
		if($borrower == ""){
			
		}else{
			$queryString = $queryString.' and a.borrower like "%'.$borrower.'%"';
		}
		
		
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
		
		
		
	}
}
?>