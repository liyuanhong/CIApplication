<?php 
class GetDevInfo extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('GetDevInfoMod');
	}
	
	public function getDevInfoFromId($id){
		echo json_encode($this->GetDevInfoMod->getDevInfoFromId($id));
	}
}

?>