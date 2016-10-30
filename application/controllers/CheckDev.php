<?php 
class CheckDev extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('CheckDevMod');
	}
	
	function getNoCheckDevs(){
		echo json_encode($this->CheckDevMod->getNoCheckDevs());
	}
}
?>