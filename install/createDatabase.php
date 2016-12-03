<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″> 
<?php


function createDb(){
	header("Content-type:text/html;charset=utf-8");
	
	$host = $_POST['host'];
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	$dbName = $_POST['dbName'];
	
	$con = mysql_connect($host,$userName,$password);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	setCoding();
	if (mysql_query("CREATE DATABASE ".$dbName,$con))
	{
		echo "Database created";
	}
	else
	{
		echo "Error creating database: " . mysql_error();
	}
	
	
	mysql_select_db($dbName, $con);
	$sql = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
		SET time_zone = "+00:00";';
	setCoding();
	mysql_query($sql,$con);
	
	$sql = "CREATE TABLE `devices` (
			  `id` int(8) NOT NULL,
			  `device_name` char(32) NOT NULL COMMENT '设备名',
			  `model` char(16) DEFAULT NULL COMMENT '设备型号',
			  `theNum` char(16) NOT NULL COMMENT '设备编号',
			  `plateform` char(16) DEFAULT NULL COMMENT '平台android或者ios',
			  `brand` char(16) DEFAULT NULL COMMENT '品牌',
			  `version` char(16) DEFAULT NULL COMMENT '系统版本 ',
			  `owner` char(16) DEFAULT NULL COMMENT '分配出去的设备，行政借给谁了',
			  `status` char(8) DEFAULT '0' COMMENT '0:未借出的状态；1：申请中；2：借出',
			  `borrower` char(32) DEFAULT NULL COMMENT '借阅者',
			  `other` char(32) DEFAULT NULL COMMENT '设备的其他信息',
			  `comments` char(64) DEFAULT NULL COMMENT '备注',
			  `category` char(16) DEFAULT NULL COMMENT '设备分类',
			  `check_dev` char(4) DEFAULT '0' COMMENT '盘点设备的字段',
			  `old_dev` char(4) DEFAULT '0' COMMENT '0表示设备是好的，1表示设备报废',
			  `add_time` char(16) DEFAULT NULL COMMENT '添加设备的时间',
			  `borrow_time` char(16) DEFAULT NULL COMMENT '借出设备的时间'
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	setCoding();
	mysql_query($sql,$con);
	$sql = "INSERT INTO `devices` (`id`, `device_name`, `model`, `theNum`, `plateform`, `brand`, `version`, `owner`, `status`, `borrower`, `other`, `comments`, `category`, `check_dev`, `old_dev`, `add_time`, `borrow_time`) VALUES
			(1, '小米1', 'MI1', '＃03-0001', 'android', '小米', '5.0.1', '小明', '2', '哟呵', 'mmm', 'bbbb', '手机', '0', '1', '2016-10-22 16:06', '2016-12-02 16:46'),
			(2, '小米2S', 'MI2S', '＃03-0002', 'android', '小米', '4.4.2', 'lx', '2', '张强', '', '', '手机', '0', '0', '2016-10-22 17:22', '2016-12-02 16:46'),
			(3, '华为荣耀7i', 'HUAWEI7i', '＃03-0003', 'android', '', '5.1', 'hong', '1', '刘浩', '', '', '手机', '0', '0', '2016-10-22 17:27', ''),
			(4, 'oppo R7s', 'OppO R7', '#03-0004', 'android', '', '4.3', 'xx', '0', '', '', '', '手机', '0', '0', '2016-10-22 17:31', '');";
	setCoding();
	mysql_query($sql,$con);
	
	
	$sql = "CREATE TABLE `dev_imgs` (
		  `id` int(8) NOT NULL,
		  `device_id` int(8) DEFAULT NULL,
		  `path` char(64) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	setCoding();
	mysql_query($sql,$con);
	$sql = "INSERT INTO `dev_imgs` (`id`, `device_id`, `path`) VALUES
			(1, 1, ' IMG_1493.jpg'),
			(2, 2, ' IMG_1494 (1).jpg'),
			(3, 3, ' IMG_1570.jpg'),
			(4, 4, ' IMG_0006.jpg'),
			(46, 4, 'IMG_1494 (2).jpg'),
			(47, 2, 'IMG_1580 (2).jpg'),
			(60, 1, '3afee389a50874450bdf9e2169cb41f7.jpg');";
	setCoding();
	mysql_query($sql,$con);
	
	
	$sql = "CREATE TABLE `users` (
		  `id` int(11) NOT NULL,
		  `user_name` char(16) DEFAULT 'guest',
		  `login_name` char(16) NOT NULL DEFAULT '',
		  `password` char(16) NOT NULL DEFAULT '',
		  `role` char(4) DEFAULT '' COMMENT '0代表草鸡管理员，1代表普通管理员，2代表guest',
		  `registe_time` char(16) DEFAULT '',
		  `login_time` char(16) DEFAULT '',
		  `icon` char(32) DEFAULT '' COMMENT '用户头像地址',
		  `session` char(16) DEFAULT '' COMMENT '登录后生产的随机字符串',
		  `comments` char(32) DEFAULT '' COMMENT '用户描述'
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	setCoding();
	mysql_query($sql,$con);
	$sql = "INSERT INTO `users` (`id`, `user_name`, `login_name`, `password`, `role`, `registe_time`, `login_time`, `icon`, `session`, `comments`) VALUES
		(1, 'admin', 'admin', 'admin', '0', '', '2016-12-02 16:45', 'default.png', '1480693545', '这是系统超级管理员'),
		(2, 'mananger', 'manager', 'pass', '1', '', '2016-11-30 08:23', 'shishang1.png', '1480490638', '普通管理员'),
		(3, 'guest', 'guest', 'pass', '2', '', '2016-11-30 08:11', 'meinv2.png', '1480489864', '访客'),
		(17, 'bb', 'lions', 'bb', '1', '2016-11-23 16:47', '', 'baozhi1.png', '', '');";
	setCoding();
	mysql_query($sql,$con);
	
	
	$sql = "ALTER TABLE `devices`
  		ADD PRIMARY KEY (`id`,`theNum`);";
	setCoding();
	mysql_query($sql,$con);
	$sql = "ALTER TABLE `dev_imgs`
  		ADD PRIMARY KEY (`id`);";
	setCoding();
	mysql_query($sql,$con);
	$sql = "ALTER TABLE `users`
  		ADD PRIMARY KEY (`id`);";
	setCoding();
	mysql_query($sql,$con);
	$sql = "ALTER TABLE `devices`
  		MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
	setCoding();
	mysql_query($sql,$con);
	$sql = "ALTER TABLE `dev_imgs`
  		MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;";
	setCoding();
	mysql_query($sql,$con);
	$sql = "ALTER TABLE `users`
  		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;";
	setCoding();
	mysql_query($sql,$con);
	
	mysql_close($con);
	showHelp();
}

//设置访问数据库编码
function setCoding(){
	mysql_query("SET NAMES utf8");
	//mysql_query("SET CHARACTER SET utf8");
	//mysql_query("SET CHARACTER_SET_RESULTS=utf8");
}

function showHelp(){
	//主机地址
	$host = $_SERVER['HTTP_HOST'];
	
	echo "<p>安装成功~</p><br>";
	echo "<p>请打开/ci/application/config/database.php</p><br>";
	echo "<p>并修改数据库配置，(username,password,database)完成安装：</p><br>";
	echo "
	'dsn'	=> '',<br>
	'hostname' => 'hostname',<br>
	'username' => 'root',<br>
	'password' => 'pass',<br>
	'database' => 'devManageSYS_new',<br>
	'dbdriver' => 'mysqli',<br>
    'dbprefix' => '',<br>
    'pconnect' => TRUE,<br>
    'db_debug' => TRUE,<br>
    'cache_on' => FALSE,<br>
    'cachedir' => '',<br>
    'char_set' => 'utf8',<br>
    'dbcollat' => 'utf8_general_ci',<br>
    'swap_pre' => '',<br>
    'encrypt' => FALSE,<br>
    'compress' => FALSE,<br>
    'stricton' => FALSE,<br>
    'failover' => array()<br>";
	
	$str = $_SERVER['PHP_SELF'];
	$arr = explode("/",$str);
	
	
	echo "<p style='color:red;'>安装完成，并且修改完配置之后请访问:</p><a href='http://".$host."/".$arr[1]."'>http://$host/$arr[1]</a><br>";
}
	

createDb();

?>