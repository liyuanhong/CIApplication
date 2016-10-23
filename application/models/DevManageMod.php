<?php

class DevManageMod extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
	
	public function getData(){
		return "getData function";
		
	}
	
	public function addDevice($devName,$devModel,$devNum,$devPlateform,$devBrand,$devVersion,$devOwner,$devOther,$devComments,$devCategory,$addTime){
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
}