<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDevices extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function addDevices(){
		$devName = $_GET['devName'];
		$devModel = $_GET['devModel'];
		$devNum = $_GET['devNum'];
		$devPlateform = $_GET['devPlateform'];
		$devWho = $_GET['devWho'];
		$devOther = $_GET['devOther'];
		$devComments = $_GET['devComments'];
		$data = array(
                'device_name' => $devName,
                'brand' => '小米',
                'plateform' => 'android',
                'version' => '6.0',
				'comments' => $devComments,
				'owner' => $devWho
            );
		$this->db->insert('devices', $data);
		$theTime = date('y-m-d h:i:s',time());
		$who = "李明";
		$where = "从"."192.168.8.51";
		$doThings = "添加了设备".$devName.'-';
		self::writeToLog($theTime,$who,$where,$doThings);
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

	public function writeToLog($theTime,$who,$where,$doThings){
		$da = date('Y-m-d');
		$theLog = self::createLogStr($theTime,$who,$where,$doThings);
		$myfile = './logs/'.$da.'.txt';
		$myfile = fopen($myfile, "a+");
		fwrite($myfile, $theLog."\n");
		fclose($myfile);
	}

	public function createLogStr($theTime,$who,$where,$doThings){
		return $theTime." ".self::addSpaceWho($who).$where." ".$doThings;
	}

	public function addSpaceWho($str){
		$len = mb_strlen($str,"UTF-8");
		$len = 4 - $len;
		for($i = 0;$i < $len*2;$i++){
			$str = $str." ";
		}
		return $str;
	}
	
}