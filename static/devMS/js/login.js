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
            url: "http://" + host + "/index.php/ManUserCnt/toLogin",
            data: {"user_name":user_name,"password":password},
            success: function (result) {
            	if(result == "fail"){
            		alert("用户名或密码错误！");
            	}else if(result == "refuse"){
            		alert("请联系管理员授予权限！");
            	}
            	else{
            		$.cookie('session', result); 
            		session = $.cookie('session');
            		var host = window.location.host;
        			var url = host + "/index.php/Welcome/searchDevices";
        			//window.location.href="http://" + url;
        			data = {plateform:'all',brand:'all',version:'all',status:'all',category:'all',borrower:'',session:session};
        			post("http://" + url,data);
            	}
            }
       });
	}
}

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
