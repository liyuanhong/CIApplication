<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index(){
		$host = $_SERVER['HTTP_HOST'];
		$address = 'index.php/Welcome/searchDevices';
		header("Location: $address"); 
	}
	 
	public function searchDevices(){	
		$this->load->helper('url');
		$this->load->view('index');
	}
	
	public function addDevices(){	
		
		//获取主机地址
		//echo $_SERVER['HTTP_HOST']."<br>";
		//获取网络地址
		$url =  $_SERVER['PHP_SELF']."<br>";
		$arr = explode("/",$url);
		//echo $arr[4];
		//获取完整的网页地址
		//echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$this->load->helper('url');
		$this->load->view('index');
	}
	
	public function manDevices(){	
		$this->load->helper('url');
		$this->load->view('index');
	}
	
	public function checkDevices(){	
		$this->load->helper('url');
		$this->load->view('index');
	}
	
	public function logMan(){	
		$this->load->helper('url');
		$this->load->view('index');
	}
	
	public function userMan(){	
		$this->load->helper('url');
		$this->load->view('index');
	}

	public function server(){	
		error_reporting(E_ALL | E_STRICT);
		require('UploadHandler.php');
		$upload_handler = new UploadHandler();
	}
}
