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



	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('DevManageMod');
		$this->load->model('GetDevInfoMod');
		$this->load->model('CheckDevMod');
	}
	 
	public function index(){
		$host = $_SERVER['HTTP_HOST'];
		$address = 'index.php/Welcome/searchDevices';
		header("Location: $address"); 
	}
	 
	public function searchDevices(){	
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
		$this->load->view('index');
	}
	
	public function manDevices(){	
		$this->load->view('index');
	}
	
	public function checkDevices(){	
		$this->load->view('index');
	}
	
	public function logMan(){	
	/**
		$arg = $this->uri->segment(3);
		$myfile = fopen("testfile.txt", "w");
		fwrite($myfile, $arg."\n");
		fclose($myfile);
	*/
		$this->load->view('index');
	}
	
	public function userMan(){	
		$this->load->view('index');
	}

    //上传文件和删除文件
	public function server(){	
		error_reporting(E_ALL | E_STRICT);
		require('UploadHandler.php');
		$param = $this->uri->segment(4);
		$requestMethod = $_SERVER['REQUEST_METHOD'];

		if(empty($param)){
			$param = $this->uri->segment(3);
			if(empty($param)){	
				$img = $_GET["file"]; //获取上传的文件名
				/** 调试用的代码，主要获取请求的url和文件名
				$requestUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$myfile = fopen("testfile.txt", "w");
				fwrite($myfile, $requestUrl."\n");
				fwrite($myfile, $img."aaa\n");
				fclose($myfile);
				*/
				$upload_handler = new UploadHandler();    //上传某张图片
			}else{
				if($requestMethod == "GET"){
					//$upload_handler = new UploadHandler();   //返回所有的图片
				}else if($requestMethod == "POST"){
					$upload_handler = new UploadHandler();
				}else if($requestMethod == "DELETE"){       //删除特定图片
					$upload_handler = new UploadHandler();
				}
			}
		}
	}
}
