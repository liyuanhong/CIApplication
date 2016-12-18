var host = window.location.host;

//删除一个用户
function delAnUser(e){
	e = e || window.event;
	butId = e.target.id;
	id = butId.substring(4);
	
	con=confirm("确定删除该设备么?");
	if(con == true){
		$.ajax({
	        type: "post",
	        url: "http://" + host + "/index.php/ManUserCnt/delAnUser",
	        data: {"id":id},
	        success: function (result) {
	          if(result == "sucess"){
	            	alert("删除成功！");
	            	location.reload(); 
	            }else{
	           		alert("删除失败");
	           	}
	      	  }
	       });
	}else{
		
	}
}

//跳转到添加用户页面
function toAddUserPage(e){
	session = $.cookie('session');
	var url = "http://" + host + "/index.php/Welcome/userMan/addUserPage";
	data = {session:session};
	post(url,data);
	
	//window.location.href="http://" + url;
}

//跳转到修改用户信息页面
function toChangeUserInfoPage(e){
	e = e || window.event;
	tarId = e.target.id;
	id = tarId.substring(7);
	var url = "http://" + host + "/index.php/Welcome/userMan/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
	//window.location.href="http://" + url;
}