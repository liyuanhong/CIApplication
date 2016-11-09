var host = window.location.host;

//查询未盘点设备
function getNoCheckedDevs(e){
	e = e || window.event;
	id = e.target.id;
	window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices/" + id;
}

//查询已盘点
function getCheckedDevs(e){
	e = e || window.event;
	id = e.target.id;
	window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices/" + id;
}

//查询所有设备
function getAllDevs(e){
	e = e || window.event;
	id = e.target.id;
	window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices/" + id;
}

//查询丢失设备
function getLostDevs(e){
	e = e || window.event;
	id = e.target.id;
	window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices/" + id;
}


//重置设备状态
function initaillizeDevsStatus(e){
	e = e || window.event;
	id = e.target.id;
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/CheckDev/initializeDevs",
        data: {},
        success: function (result) {
          if(result == "scuess"){
        	  alert("重置成功，页面将跳转！");
        	  window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices"; 
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
	window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices/" + deviceId;
}

//确认盘点
function confirmIsAt(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(9);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/CheckDev/setDevStatusToAt",
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
        url: "http://" + host + "/ci/index.php/CheckDev/setDevStatusToLost",
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

//重置设备状态
function initaillizeTheDev(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(9);
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/CheckDev/setDevStatusToInitial",
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


