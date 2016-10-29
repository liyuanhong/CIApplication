<?php 
class GetDevInfoMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	public function getDevInfoFromId($id){
		$queryString = 'select a.id,a.device_name,a.model,a.theNum,a.plateform,a.brand,a.version,a.owner,a.status,a.borrower,
					a.borrow_time,a.other,a.comments,a.category,a.add_time,b.path from devices a,dev_imgs b where a.id=b.device_id and '.'a.id='.$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
}
?>