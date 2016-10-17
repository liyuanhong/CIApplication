<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDevices extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
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
		$data = array(
                'device_name' => $devName,
                'model' => $devModel,
				'theNum' => $devNum,
                'plateform' => $devPlateform,
				'brand' => $devBrand,
                'version' => $devVersion,
				'owner' => $devOwner,
				'other' => $devOther,
				'comments' => $devComments,
				'category' => $devCategory,
				'add_time' => $addTime,
            );
		$this->db->insert('devices', $data);
		
		//查询插入设备的设备id
		$this->db->where('device_name', $devName); 
		$this->db->select('id');
		$query = $this->db->get('devices');
		$arr = $query->row_array();
		$device_id = $arr['id'];
		
		//向数据库插入图片路径
		if($img_conunt != 0){
			for($i = 1;$i <= $img_conunt - 1;$i++){
				$data_img = array(
					'device_id' => $device_id,
					'path' => $imgs[$i],
				);
				$this->db->insert('dev_imgs', $data_img);
			}
		}
		
		//写入操作日志
		$theTime = date('y-m-d h:i:s',time());
		$who = "李明";
		$where = "从".$_SERVER['HTTP_HOST'];
		$doThings = "添加了设备：".$devName.'--编号：'.$devNum;
		self::writeToLog($theTime,$who,$where,$doThings);
		
		echo "sucess";
	}

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

	//写入到日志文件
	public function writeToLog($theTime,$who,$where,$doThings){
		$da = date('Y-m-d');
		$theLog = self::createLogStr($theTime,$who,$where,$doThings);
		$myfile = './logs/'.$da.'.txt';
		$myfile = fopen($myfile, "a+");
		fwrite($myfile, $theLog."\n");
		fclose($myfile);
	}

	//创建单条操作日志
	public function createLogStr($theTime,$who,$where,$doThings){
		return $theTime." "."*".self::addSpaceWho($who)."*".$where." "."*".$doThings;
	}

	//给用户名补齐空格
	public function addSpaceWho($str){
		$len = mb_strlen($str,"UTF-8");
		$len = 4 - $len;
		for($i = 0;$i < $len*2;$i++){
			$str = $str." ";
		}
		return $str;
	}
	
}