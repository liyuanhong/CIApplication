//菜单的切换
function changeMenu(e){
	e = e || window.event;
		if(e.target.id == "searchDevices"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/searchDevices";
			//window.location.href="http://" + url;
			data = {plateform:'all',brand:'all',version:'all',status:'all',category:'all',borrower:'',session:session};
			post("http://" + url,data);
		}else if(e.target.id == "addDevices"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/addDevices";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "manDevices"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/manDevices";
			//window.location.href="http://" + url;
			data = {plateform:'all',brand:'all',version:'all',status:'all',category:'all',borrower:'',session:session,old_dev:'all'};
			post("http://" + url,data);
		}else if(e.target.id == "checkDevices"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/checkDevices";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "logMan"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/logMan";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "userMan"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/userMan";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "myPage"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/myPage";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "otherToolsPage"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/otherToolsPage";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "aboutPage"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/aboutPage";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
		}else if(e.target.id == "showManager"){
			session = $.cookie('session');
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/showManager";
			//window.location.href="http://" + url;
			data = {session:session};
			post("http://" + url,data);
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

//跳转到登录界面
function jumpToLoginPage(e){
	var host = window.location.host;
	var url = host + "/ci/index.php/Welcome/login";
	window.location.href="http://" + url;
}

//退出登陆
function logout(e){
	var host = window.location.host;
	e = e || window.event;
	$.cookie('session', null); 
	session = $.cookie('session',{path:'\'});
	var host = window.location.host;
	var url = host + "/ci/index.php/Welcome/searchDevices";
	data = {plateform:'all',brand:'all',version:'all',status:'all',category:'all',borrower:'',session:session};
	post("http://" + url,data);
}

//跳转到注册页面
function jumpToRegisterPage(e){
	var host = window.location.host;
	var url = host + "/ci/index.php/Welcome/register";
	window.location.href="http://" + url;
}
