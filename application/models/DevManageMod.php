<?php

class DevManageMod extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }
	
	public function getData(){
		return "getData function";
		
	}
	
	//向数据库添加新设备
	public function addDevice($devName,$devModel,$devNum,$devPlateform,$devBrand,$devVersion,
			$devOwner,$devOther,$devComments,$devCategory,$addTime,$img_conunt,$imgs){
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
	}
	
	public function getDevInfo(){
		$query = $this->db->query("select a.id,a.device_name,a.model,a.theNum,a.owner,a.status,a.borrower,
					a.borrow_time,b.path from devices a,dev_imgs b where a.id=b.device_id");
		$arr = $query->result();
		//$jresult = json_encode($arr);
		return $arr;
	}
	
	public function test1(){
		//$this->db->select('id','device_name','model','theNum','owner','status','borrower','borrow_time');
		//$query = $this->db->get('devices');
		$query = $this->db->query("select a.id,a.device_name,a.model,a.theNum,a.owner,a.status,a.borrower,
					a.borrow_time,b.path from devices a,dev_imgs b where a.id=b.device_id");
		$arr = $query->result();
		$jresult = json_encode($arr);
		return $jresult;
		
	}
	
	public function test2(){
		error_reporting(E_ALL & ~E_DEPRECATED);
	
		$con = mysql_connect('localhost','root','pass');
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("devManageSYS", $con);
	
		mysql_query("SET NAMES UTF8");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8");
	
		$result = mysql_query("SELECT * FROM devices");
		$arr = array();
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$arr[] = $row;
		}
		mysql_close($con);
		return json_encode(array('result'=>$arr));
	}
	
	//改变设备的状态为申请中
	public function changeDevStatusToApplying($id,$borrower){
		$data = array(
			"status" => "1",
			"borrower" => $borrower
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
	}
	
	//改变设备的状态为可签借状态
	public function changeDevStatusToNone($id){
		$data = array(
				"status" => "0",
				"borrower" => ""
		);
		$this->db->where("id",$id);
		$this->db->update("devices",$data);
	}
}



