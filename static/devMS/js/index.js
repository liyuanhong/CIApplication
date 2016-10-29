//菜单的切换
function changeMenu(e){
	e = e || window.event;
		if(e.target.id == "searchDevices"){
			var host = window.location.host;
			var url = host + "/ci";
			window.location.href="http://" + url;
		}else if(e.target.id == "addDevices"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/addDevices";
			window.location.href="http://" + url;
		}else if(e.target.id == "manDevices"){
			var host = window.location.host;
			var url = host + "/ci/index.php/Welcome/manDevices";
			window.location.href="http://" + url;
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