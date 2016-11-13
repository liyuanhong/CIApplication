//菜单的切换
function changeMenu(e){
	e = e || window.event;
		if(e.target.id == "searchDevices"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/searchDevices";
			//window.location.href="http://" + url;
			data = {plateform:'all',brand:'all',version:'all',status:'all',category:'all',borrower:''};
			post("http://" + url,data);
		}else if(e.target.id == "addDevices"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/addDevices";
			window.location.href="http://" + url;
		}else if(e.target.id == "manDevices"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/manDevices";
			//window.location.href="http://" + url;
			data = {plateform:'all',brand:'all',version:'all',status:'all',category:'all',borrower:''};
			post("http://" + url,data);
		}else if(e.target.id == "checkDevices"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/checkDevices";
			window.location.href="http://" + url;
		}else if(e.target.id == "logMan"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/logMan";
			window.location.href="http://" + url;
		}else if(e.target.id == "userMan"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/userMan";
			window.location.href="http://" + url;
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

function jumpToLoginPage(e){
	var host = window.location.host;
	var url = host + "/ci/index.php/Welcome/login";
	window.location.href="http://" + url;
}