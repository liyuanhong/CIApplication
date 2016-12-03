<!DOCTYPE html>
<html>
<head>
	<title>install</title>
</head>
<body style="background-color: #EEEEFF;">
<?php 
//主机地址
$host = $_SERVER['HTTP_HOST'];


?>
<script src="http://<?php echo $host;?>/ci/static/devMS/js/jquery-3.1.1.min.js"></script>
<script src="http://<?php echo $host;?>/ci/static/devMS/js/jquery.cookie.js"></script>
<link href="http://<?php echo $host;?>/ci/static/dist/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
tr{
	height:50px;
}
</style>



<div style="background-color: #EEEEFF;text-align:center">
	<h3>安装设备管理系统</h3>
	<p style="color:red;margin-top:30px;">填写拥有创建数据库权限的用户账号：</p>
	<div style="text-align:center;">
		<table style="text-align:center;width:300px;margin:0 auto;">
			<tr>
				<td>数据库地址：</td><td><input id="host" type="text" class="form-control"></td>
			</tr>
			<tr>
				<td>创建数据库名：</td><td><input id="dbName" type="text" class="form-control"></td>
			</tr>
			<tr>
				<td>用户名：</td><td><input id="userName" type="text" class="form-control"></td>
			</tr>
			<tr>
				<td>密码:</td><td><input id="password" type="password" class="form-control"></td>
			</tr>
			<tr rowspan="2">
				<td colSpan="2" ><button type="button" id="install" class="btn btn-success" style="width:100px;float:right;">安 装</button></td>
			</tr>
		</table>
	</div>
</div>

<script type="text/javascript">
//以post方式请求页面
function post(URL, PARAMS) {
  var temp = document.createElement("form");
  temp.action = URL;
  temp.method = "post";
  temp.style.display = "none";
  for (var x in PARAMS) {
    var opt = document.createElement("textarea");
    opt.name = x;
    opt.value = PARAMS[x];
    // alert(opt.name)
    temp.appendChild(opt);
  }
  document.body.appendChild(temp);
  temp.submit();
  return temp;
}

$('#install').click(function(){
	var host = window.location.host;

	path = window.location.pathname;
	var arr = path.split("/");
	
	host = $('#host').val();
	dbName = $('#dbName').val();
	userName = $('#userName').val();
	password = $('#password').val();
	
	if(host == "" || dbName == "" || host == "" || password == ""){
		alert("亲，请补全信息~");
	}else{
		var url = "http://" + host + "/" + arr[1] + "/install/createDatabase.php";
		data = {"host":host,"dbName":dbName,"userName":userName,"password":password};
		post( url,data);
	}
});

</script>
</body>
</html>
