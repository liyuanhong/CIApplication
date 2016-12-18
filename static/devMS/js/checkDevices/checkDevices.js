var host = window.location.host;

//查询未盘点设备
function getNoCheckedDevs(e){
	e = e || window.event;
	id = e.target.id;
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + id;
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
}

//查询已盘点
function getCheckedDevs(e){
	e = e || window.event;
	id = e.target.id;
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + id;
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
}

//查询所有设备
function getAllDevs(e){
	e = e || window.event;
	id = e.target.id;
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + id;
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
}

//查询丢失设备
function getLostDevs(e){
	e = e || window.event;
	id = e.target.id;
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + id;
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
}

//查询已报废
function getOldtDevs(e){
	e = e || window.event;
	id = e.target.id;
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + id;
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
}

//查询未报废
function getAvailableDevs(e){
	e = e || window.event;
	id = e.target.id;
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + id;
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + id;
	session = $.cookie('session');
	data = {session:session};
	post(url,data);
}

//重置设备状态
function initaillizeDevsStatus(e){
	e = e || window.event;
	id = e.target.id;
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/CheckDev/initializeDevs",
        data: {},
        success: function (result) {
          if(result == "scuess"){
        	  alert("重置成功，页面将跳转！");
        	  //window.location.href="http://" + host + "/index.php/Welcome/checkDevices"; 
        	  var url = "http://" + host + "/index.php/Welcome/checkDevices/no_checked";
    		  session = $.cookie('session');
    		  data = {session:session};
    		  post(url,data);
            }else{
           		alert("重置失败，请重新尝试！");
           	}
      	  }
       });
}



//进入单个设备信息页面
function showDevInfo(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(5);
	session = $.cookie('session');
	var url = "http://" + host + "/index.php/Welcome/checkDevices/" + deviceId;
	data = {session:session};
	post(url,data);
	//window.location.href="http://" + host + "/index.php/Welcome/checkDevices/" + deviceId;
}

//确认盘点
function confirmIsAt(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(9);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/CheckDev/setDevStatusToAt",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
        	  location.reload();  
            }else{
           		alert("操作失败，请重新尝试！");
           	}
      	  }
       });
	
}

//确认丢失
function confirmLost(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(9);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/CheckDev/setDevStatusToLost",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
        	  location.reload(); 
            }else{
           		alert("操作失败，请重新尝试！");
           	}
      	  }
       });
}

//重置单个设备状态
function initaillizeTheDev(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(9);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/CheckDev/setDevStatusToInitial",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
        	  location.reload(); 
        }else{
           		alert("操作失败，请重新尝试！");
           	}
      	  }
       });
}

//修改设备状态为报废
function setDevStatusToOld(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(4);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/CheckDev/setDevStatusToOld",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
        	  location.reload(); 
            }else{
           		alert("操作失败，请重新尝试！");
           	}
      	  }
       });
}

//修改设备状态为非报废状态
function setDevStatusToAvilable(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(10);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/CheckDev/setDevStatusToAvilable",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
        	  location.reload(); 
            }else{
           		alert("操作失败，请重新尝试！");
           	}
      	  }
       });
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


