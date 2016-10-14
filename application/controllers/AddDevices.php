<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddDevices extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function addDevices(){
		$data = array(
                'device_name' => '红米 4 pro',
                'brand' => '小米',
                'plateform' => 'android',
                'version' => '6.0'
            );
		$this->db->insert('devices', $data);
		$myfile = fopen("bbb.txt", "w");
		fwrite($myfile, $data['device_name']);
		fclose($myfile);
		echo "sucess  !";
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
}