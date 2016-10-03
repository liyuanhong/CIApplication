<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageDev extends CI_Controller {
	//数据的的链接配置
	
	
	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
		$config['hostname'] = '192.168.8.49';
		$config['username'] = 'root';
		$config['password'] = 'pass';
		$config['database'] = 'deviceSYS';
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
		$config['db_debug'] = TRUE;
		$config['cache_on'] = FALSE;
		$config['cachedir'] = '';
		$config['char_set'] = 'utf8';
		$config['dbcollat'] = 'utf8_general_ci';
		
		$this->load->model('DevManage', '', $config);
    }
	
	public function test(){
		echo $this->DevManage->getData();
	}
	
}