var host = window.location.host;

//添加一个用户
function addUser(e){
	e = e || window.event;
	user_name = $("#user_name").val();
	password = $("#password").val();
	login_name = $("#login_name").val();
	role = $("#role").val();
	
	if(user_name == "" || login_name == "" || password == ""){
		alert("用户名，登录名，密码不能为空！");
	}else{
		$.ajax({
        	type: "post",
            url: "http://" + host + "/index.php/ManUserCnt/addAnUser",
            data: {"user_name":user_name,"password":password,"login_name":login_name,"role":role},
            success: function (result) {
            	if(result == "sucess"){
            		alert("添加成功");
            		$("#user_name").val("");
            		$("#password").val("");
            		$("#login_name").val("");
            		$("#role").val("1");
            	}else{
            		alert("申请失败");
            	}
            }
       });
	}
}