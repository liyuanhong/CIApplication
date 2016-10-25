<?php
require dirname(__FILE__)."/../libraries/CI_Log.php";
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageDev extends CI_Controller {
	//数据的的链接配置
	
	
	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->model('DevManageMod');
    }
	
	public function test1(){
		echo $this->DevManageMod->test1();
	}
	
	public function test2(){
		echo $this->DevManageMod->test2();
	}

	//向数据库添加设备
	public function addDevices(){
		$devName = $_GET['devName'];
		$devModel = $_GET['devModel'];
		$devNum = $_GET['devNum'];
		$devPlateform = $_GET['devPlateform'];
		$devOwner = $_GET['devOwner'];
		$devBrand = $_GET['devBrand'];
		$devVersion = $_GET['devVersion'];
		$devCategory = $_GET['devCategory'];
		$devOther = $_GET['devOther'];
		$devComments = $_GET['devComments'];
		
		
		$uploadPics = $_GET['uploadPics'];
		$imgs = explode("*",$uploadPics);
		$img_conunt = count($imgs);
		$addTime = date('Y-m-d H:i:s',time());
		//向数据库插入新设备
		$this->DevManageMod->addDevice($devName,$devModel,$devNum,$devPlateform,$devBrand,$devVersion,$devOwner,
				$devOther,$devComments,$devCategory,$addTime,$img_conunt,$imgs);
		
		//写入操作日志
		$theTime = date('y-m-d h:i:s',time());
		$who = "李明";
		$where = "从".$_SERVER['HTTP_HOST'];
		$doThings = "添加了设备：".$devName.'--编号：'.$devNum;
		writeToLog($theTime,$who,$where,$doThings);
		
		echo "sucess";
	}
	
	//设备查询
	public function getDevInfo(){
		echo json_encode($this->DevManageMod->getDevInfo());
	}

	//获取设备的所有信息
	public function queryDevices(){
		//查询用户表
		$query = $this->db->get('devices');
		//将结果转换为数组
		$arr = $query->result();
		//将数组砖换为json
		$jresult = json_encode($arr);

		$myfile = fopen("bbb.txt", "w");
		fwrite($myfile, $jresult);
		fclose($myfile);
		return $jresult;
	}	
}