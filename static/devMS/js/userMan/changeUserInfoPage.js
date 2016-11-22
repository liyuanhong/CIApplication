var host = window.location.host;

//修改用户信息
function changeUserInfo(e){
	e = e || window.event;
	butId = e.target.id;
	id = butId.substring(11);
	user_name = $("#user_name").val();
	login_name = $("#login_name").val();
	password = $("#password").val();
	role = $("#role").val();
	registe_time = $("#registe_time").val();
	login_time = $("#login_time").val();
	session = $("#session").val();
	
	if(typeof($(".input_style").attr("disabled"))=="undefined"){
		$.ajax({
        	type: "post",
            url: "http://" + host + "/ci/index.php/ManUserCnt/changeUserInfo",
            data: {"id":id,"user_name":user_name,"password":password,"login_name":login_name,"role":role,"login_time":login_time,"registe_time":registe_time,"session":session},
            success: function (result) {
            	if(result == "sucess"){
            		alert("修改成功");
            		location.reload(); 
            	}else{
            		alert("修改失败");
            	}
            }
       });
		$(".input_style").attr("disabled","disabled");
		$("#"+butId).text("修改");
	}else if($(".input_style").attr("disabled") == "disabled"){
		
		$(".input_style").removeAttr("disabled");
		$("#"+butId).text("提交");
	}
	
}