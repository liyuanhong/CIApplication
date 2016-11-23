<?php 
class ManDevMod extends CI_Model {

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
	

	//借出设备或确认申请设备
	function confirmBorrowed($id,$borrower,$borrow_time){
		$data = array(
				"status" => "2",
				"borrower" => $borrower,
				"borrow_time"=>$borrow_time
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "sucess";
	}
	
	//拒绝申请设备
	function refuseBorrowed($id,$borrow_time){
		$data = array(
				"status" => "0",
				"borrower" => "",
				"borrow_time"=>$borrow_time
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "sucess";
	}
	
	//归还设备
	function confirmReturned($id){
		$data = array(
				"status" => "0",
				"borrower"=>"",
				"borrow_time"=>""
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "sucess";
	}
	
	//删除设备
	function deleteDev($id){
		$this->db->where('id',$id);
		$this->db->delete('devices');
		
		return "sucess";
	}
	
	//修改设备基本信息
	function changeDevInfo($id,$device_name,$model,$theNum,$owner,$brand,$plateform,$version,$category,$other,$comments){
		$id = $_POST['id'];
		$device_name = $_POST['dev_name'];
		$model = $_POST['dev_model'];
		$theNum = $_POST['dev_num'];
		$owner = $_POST['dev_owner'];
		$plateform = $_POST['dev_plateform'];
		$brand = $_POST['dev_brand'];
		$version = $_POST['dev_version'];
		$category = $_POST['dev_category'];
		$other = $_POST['dev_other'];
		$comments = $_POST['dev_comments'];
		
		$data = array(
				"device_name"=>$device_name,
				"model"=>$model,
				"theNum"=>$theNum,
				"owner"=>$owner,
				"plateform"=>$plateform,
				"brand"=>$brand,
				"version"=>$version,
				"category"=>$category,
				"other"=>$other,
				"comments"=>$comments
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
	}
	
	//修改签借人
	function changeBorrower($id,$borrower){
		$data = array(
				"borrower" => $borrower
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		
		return "sucess";
	}
	
	function getDevNum($id){
		$queryString = "select theNum,device_name,borrower from devices where id = ".$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
	
	//获取某个设备的所有信息
	function getDevAllInfo($id){
		$queryString = "select * from devices where id=".$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $arr;
	}
}
?>