var host = window.location.host;

function register(e){
	e = e || window.event;
	user_name = $("#user_name").val();
	login_name = $("#login_name").val();
	password = $("#password").val();
	repassword = $("#repassword").val();
	
	if(user_name == "" || login_name == "" || password == ""){
		alert("用户名和登录名、密码不能为空!");
	}else{
		if(password == repassword){
			$.ajax({
	        	type: "post",
	            url: "http://" + host + "/index.php/ManUserCnt/toRegister",
	            data: {"user_name":user_name,"login_name":login_name,"password":password},
	            success: function (result) {
	            	if(result == "sucess"){
	            		alert("注册成功，请联系管理员授权！");
	            		window.history.go(-1);
	            	}else{
	            		alert("注册失败！");
	            	}
	            }
	       });
		}else{
			alert("密码不统一，请重新输入密码！")
		}
	}
}