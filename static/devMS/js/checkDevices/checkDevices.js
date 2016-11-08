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
	window.location.href="http://" + host + "/ci/index.php/Welcome/checkDevices/" + id;
}


//进入单个设备信息页面
function showDevInfo(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(5);
	window.location.href="http://" + host + "/ci/index.php/Welcome/searchDevices/" + deviceId;
}
