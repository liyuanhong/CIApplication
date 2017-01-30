<?php 
class ManUserMod extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	/**获取所有用户的某些信息
	public function getUsersInfo(){
		$queryString = 'select id,user_name,login_name,password,role,icon from users';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
	*/
	
	//获取所有用户的某些信息
	public function getUsersInfo($role,$login_name){
		if($role == 0){
			$queryString = 'select id,user_name,login_name,password,role,icon from users';
			$query = $this->db->query($queryString);
			$arr = $query->result();
			return $arr;
		}else if($role == 1){
			$queryString = 'select id,user_name,login_name,password,role,icon from users where login_name="'.$login_name.'"';
			$query = $this->db->query($queryString);
			$arr = $query->result();
			return $arr;
		}else{
			return array();
		}
		
	}
	
	//获取普通管理员的某些信息
	public function getManagerInfo(){
		$queryString = 'select id,user_name,role,icon from users where role=1';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
	
	//获取某个用户的所有信息
	public function getUserAllInfoFromId($id){
		$queryString = 'select * from users where id='.$id;
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
				"icon"=>"default.png",
				"comments"=>"访客"
		);
		$this->db->insert('users', $data);
	}
	
	
	//获取该用户名和密码对应的用户id
	public function login($login_name,$password){
		$queryString = 'select id,login_name,role from users where login_name="'.$login_name.'" and password="'.$password.'"';
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
	
	//添加一个用户
	public function addAnUser($user_name,$login_name,$password,$role,$icon,$registe_time){
		$data = array(
				"user_name" => $user_name,
				"login_name"=>$login_name,
				"password"=>$password,
				"registe_time"=>$registe_time,
				"role"=>$role,
				"icon"=>$icon
		);
		$this->db->insert('users', $data);
	}
	
	//修改用户的个人信息
	function changeUserInfo($id,$user_name,$login_name,$password,$role,$login_time,$registe_time,$session){
		$this->db->where("id",$id);
		$data = array(
				"user_name" => $user_name,
				"login_name"=>$login_name,
				"password"=>$password,
				"registe_time"=>$registe_time,
				"login_time"=>$login_time,
				"role"=>$role,
				"session"=>$session
		);
		$this->db->update('users', $data);
	}
	
	//修改用户头像
	function changeUserIcon($id,$icon){
		$this->db->where("id",$id);
		$data = array(
				"icon" => $icon,
		);
		$this->db->update('users', $data);
	}
	
	//根据session获取用户信息
	function getUserInfoFromSession($session){
		$queryString = 'select user_name,login_name,role,session from users where session="'.$session.'"';
		$query = $this->db->query($queryString);
		$arr = $query->result();
		return $arr;
	}
	
	//判断是否登录
	function isLogin($session){
		if($session == ""){
			$session = "3$^$^4^";
		}
		$result = $this::getUserInfoFromSession($session);
		if(count($result) == 1){
			return 1;   //表示登录
		}else if(count($result) == 0){
			return 0;   //表示未登陆
		}
	}
}
?>