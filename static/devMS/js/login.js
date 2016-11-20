var host = window.location.host;

function login(e){
	e = e || window.event;
	user_name = $("#user_name").val();
	password = $("#password").val();
	
	if(user_name == "" || password == ""){
		alert("用户名或密码不能为空!");
	}else{
		$.ajax({
        	type: "post",
            url: "http://" + host + "/ci/index.php/ManUserCnt/toLogin",
            data: {"user_name":user_name,"password":password},
            success: function (result) {
            	if(result == "fail"){
            		alert("用户名或密码错误！");
            	}else{
            		$.cookie('session', result); 
            		window.history.go(-1);
            	}
            }
       });
	}
}