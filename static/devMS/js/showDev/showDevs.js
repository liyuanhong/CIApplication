var host = window.location.host;

//申请设备
function applyFor(e){
	e = e || window.event;
	//获取被点击元素的id对应的input元素的id
	inputId = "#input_" + e.target.id;
	deviceId = e.target.id;
	deviceName = $("#label_" + e.target.id).text();
	
	//inputId = $(inputId).parents().prev().find("input").val();
	//inputId = $(inputId).parent('.form-control').val();
	if($(inputId).val() == ""){
		alert("申请人不能为空！");
	}else{
	 	var borrower = $(inputId).val();
		$.ajax({
        	type: "get",
            url: "http://" + host + "/ci/index.php/ManageDev/applyForDev",
            data: {"id":deviceId,"borrower":borrower,"device_name":deviceName},
            success: function (result) {
            	if(result == "scuess"){
            		//alert(result);
            		location.reload(); 
            	}else{
            		alert("申请失败");
            	}
            }
       });
	}
	
}

//取消申请设备
function cancleApplyFor(e){
	e = e || window.event;
	//获取被点击元素的id
	deviceId = e.target.id;
	deviceName = $("#label_" + e.target.id).text();
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/ManageDev/cancleApplyForDev",
        data: {"id":deviceId,"device_name":deviceName},
        success: function (result) {
          if(result == "scuess"){
            	//alert(result);
            	location.reload(); 
            }else{
           		alert("取消申请失败");
           	}
      	  }
       });
}

//进入单个设备信息页面
function showDevInfo(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(5);
	window.location.href="http://" + host + "/ci/index.php/Welcome/searchDevices/" + deviceId;
}
