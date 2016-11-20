<?php 
class ManUserMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	//获取所有用户的某些信息
	public function getUsersInfo(){
		$queryString = 'select id,user_name,login_name,password,role,icon from users';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
	
	//注册一个用户
	public function registerAnUser($user_name,$login_name,$password,$registe_time){
		$data = array(
				"user_name" => $user_name,
				"login_name"=>$login_name,
				"password"=>$password,
				"registe_time"=>$registe_time,
				"role"=>2,
				"icon"=>"default.jpg",
				"comments"=>"访客"
		);
		$this->db->insert('users', $data);
	}
	
	
	//获取该用户名和密码对应的用户id
	public function login($login_name,$password){
		$queryString = 'select id,login_name from users where login_name="'.$login_name.'" and password="'.$password.'"';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
	
	//获取某个用户的信息
	public function getUserInfoFromId($id){
		$queryString = 'select id,login_name from users where id='.$id;
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
	
	public function createSession($id,$session,$login_time){
		$data = array(
				"session" => $session,
				"login_time"=>$login_time
		);
		$this->db->where('id', $id);
		$this->db->update("users",$data);
	}
	
	//删除一个用户
	public function delAnUser($id){
		$this->db->where('id',$id);
		$this->db->delete('users');
	}
}
?>