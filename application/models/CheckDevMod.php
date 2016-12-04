<?php 
class CheckDevMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	//获取没有盘点的设备
	function getNoCheckDevs(){
		//$queryString = 'select a.id,a.device_name,a.model,a.theNum,a.borrower,a.owner,a.borrow_time,
		//		b.path from devices a,dev_imgs b where a.id=b.device_id and check_dev="0"';
		$queryString = 'select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,
				path,device_id,old_dev from devices left join dev_imgs on devices.id=dev_imgs.device_id where devices.check_dev="0" ORDER BY add_time DESC';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		//return $arr;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	
	//获取已经盘点过的设备
	function getCheckedDevs(){
		//$queryString = 'select a.id,a.device_name,a.model,a.theNum,a.borrower,a.owner,a.borrow_time,
		//		b.path from devices a,dev_imgs b where a.id=b.device_id and check_dev="1"';
		$queryString = 'select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,
				path,device_id,old_dev from devices left join dev_imgs on devices.id=dev_imgs.device_id where devices.check_dev="1" ORDER BY add_time DESC';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		//return $arr;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	
	//获取所有设备
	function getAllDevs(){
		//$queryString = 'select a.id,a.device_name,a.model,a.theNum,a.borrower,a.owner,a.borrow_time,
		//		b.path from devices a,dev_imgs b where a.id=b.device_id';
		$queryString = 'select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,
				path,device_id,old_dev from devices left join dev_imgs on devices.id=dev_imgs.device_id ORDER BY add_time DESC';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		//return $arr;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	
	//获取丢失的设备
	function getLostDevs(){
		//$queryString = 'select a.id,a.device_name,a.model,a.theNum,a.borrower,a.owner,a.borrow_time,
		//		b.path from devices a,dev_imgs b where a.id=b.device_id and check_dev="2"';
		$queryString = 'select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,
				path,device_id,old_dev from devices left join dev_imgs on devices.id=dev_imgs.device_id where devices.check_dev="2" ORDER BY add_time DESC';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		//return $arr;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	
	//获取已报废的设备
	function getDevStatusToOld(){
		$queryString = 'select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,
				path,device_id,old_dev from devices left join dev_imgs on devices.id=dev_imgs.device_id where devices.old_dev="1" ORDER BY add_time DESC';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		//return $arr;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	
	//获取未报废的设备
	function getDevStatusToAvilable(){
		$queryString = 'select devices.id,device_name,model,theNum,owner,status,borrower,borrow_time,
				path,device_id,old_dev from devices left join dev_imgs on devices.id=dev_imgs.device_id where devices.old_dev="0" ORDER BY add_time DESC';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		//return $arr;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		$retu = array();
		foreach($arr as $va){
			if(isset($retu[$va->device_id])){
				$retu[$va->device_id]->path[] = $va->path;
				continue;
			}else{
				$va->path = array($va->path);
				$retu[$va->id] = $va;
			}
		}
		return $retu;
	}
	
	//重置设备状态
	function initializeDevs(){
		
		$data = array(
				"check_dev" => "0"
		);
		$this->db->update("devices",$data);
		return "scuess";
		/**
		$queryString = 'select a.id,a.device_name,a.model,a.theNum,a.borrower,a.owner,a.borrow_time,
				b.path from devices a,dev_imgs b where a.id=b.device_id and check_dev="0"';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
		*/
	}
	
	//修改设备状态为已盘点
	function setDevStatusToAt($id){
		$data = array(
				"check_dev" => "1"
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "scuess";
	}
	
	
	//修改设备状态为丢失
	function setDevStatusToLost($id){
		$data = array(
				"check_dev" => "2"
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "scuess";
	}
	
	//修改设备状态为初始状态
	function setDevStatusToInitial($id){
		$data = array(
				"check_dev" => "0"
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "scuess";
	}
	
	//修改设备状态为报废
	function setDevStatusToOld($id){
		$data = array(
				"old_dev" => "1"
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "scuess";
	}
	
	//修改设备状态为非报废状态
	function setDevStatusToAvilable($id){
		$data = array(
				"old_dev" => "0"
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
		return "scuess";
	}
	
}



?>