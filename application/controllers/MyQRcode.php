<?php 
require dirname(__FILE__)."/../libraries/CI_Util.php";
require dirname(__FILE__)."/../libraries/CI_Log.php";
require dirname(__FILE__)."/../libraries/phpqrcode/qrlib.php";
class MyQRcode extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ManUserMod');
	}
	
	//获取所有用户的某些信息
	
	public function showQRcode(){
		//主机地址
		$host = $_SERVER['HTTP_HOST'];
		QRcode::png($host."/index.php/welcome/showQRcodeAdddevices");
	}

}

?>