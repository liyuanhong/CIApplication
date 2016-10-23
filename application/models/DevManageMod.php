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
	
}