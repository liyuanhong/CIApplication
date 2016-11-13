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
function toChangeDevInfo(e){
	e = e || window.event;
	id = e.target.id;
	deviceId = id.substring(5);
	window.location.href="http://" + host + "/ci/index.php/Welcome/manDevices/" + deviceId;
}

function searchDevs(e){
	e = e || window.event;
	id = e.target.id;
	
	dev_plateform = $("#dev_plateform").val();
	dev_brand = $("#dev_brand").val();
	dev_version = $("#dev_version").val();
	dev_status = $("#dev_status").val();
	dev_category = $("#dev_category").val();
	borrower = $("#borrower").val();
	
	var url = host + "/ci/index.php/Welcome/manDevices";
	//window.location.href="http://" + url;
	data = {plateform:dev_plateform,brand:dev_brand,version:dev_version,status:dev_status,category:dev_category,borrower:borrower};
	post("http://" + url,data);
	
}

//修改签借人
function modifyBorrower(e){
	e = e || window.event;
	id = e.target.id;
	idNum = id.substring(7);
	inputId = "#input_" + idNum;
	//alert(inputId);
	if(typeof($(inputId).attr("disabled"))=="undefined"){
		$(inputId).attr("disabled","disabled");
		/**
		deviceName = $("#label_" + e.target.id).text();
		$.ajax({
	        type: "get",
	        url: "http://" + host + "/ci/index.php/ManDevCnt/deleteDev",
	        data: {"id":deviceId},
	        success: function (result) {
	          if(result == "scuess"){
	            	//alert(result);
	            	location.reload(); 
	            }else{
	           		alert("删除失败！");
	           	}
	      	  }
	       });
	       */
	}else if($(inputId).attr("disabled") == "disabled"){
		$(inputId).removeAttr("disabled");
	}
}

//删除设备
function deleteDev(e){
	e = e || window.event;
	//获取被点击元素的id
	deviceId = e.target.id;
	id = deviceId.substring(7);
	alert(id);
	/**
	deviceName = $("#label_" + e.target.id).text();
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/ManDevCnt/deleteDev",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
            	//alert(result);
            	location.reload(); 
            }else{
           		alert("删除失败！");
           	}
      	  }
       });
       */
}

//修改设备
function changeDevInfo(e){
	e = e || window.event;
	//获取被点击元素的id
	deviceId = e.target.id;
	id = deviceId.substring(7);
	alert(id);
	/**
	deviceName = $("#label_" + e.target.id).text();
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/ManDevCnt/deleteDev",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
            	//alert(result);
            	location.reload(); 
            }else{
           		alert("删除失败！");
           	}
      	  }
       });
       */
}

//确认归还
function confirmReturned(e){
	e = e || window.event;
	//获取被点击元素的id
	deviceId = e.target.id;
	id = deviceId.substring(7);
	alert(id);
	/**
	deviceName = $("#label_" + e.target.id).text();
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/ManDevCnt/deleteDev",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
            	//alert(result);
            	location.reload(); 
            }else{
           		alert("删除失败！");
           	}
      	  }
       });
       */
}

//确认借出
function confirmBorrowed(e){
	e = e || window.event;
	//获取被点击元素的id
	deviceId = e.target.id;
	id = deviceId.substring(8);
	alert(id);
	/**
	deviceName = $("#label_" + e.target.id).text();
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/ManDevCnt/deleteDev",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
            	//alert(result);
            	location.reload(); 
            }else{
           		alert("删除失败！");
           	}
      	  }
       });
       */
}

//拒绝借出
function refuseBorrowed(e){
	e = e || window.event;
	//获取被点击元素的id
	deviceId = e.target.id;
	id = deviceId.substring(7);
	alert(id);
	/**
	deviceName = $("#label_" + e.target.id).text();
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/ManDevCnt/deleteDev",
        data: {"id":deviceId},
        success: function (result) {
          if(result == "scuess"){
            	//alert(result);
            	location.reload(); 
            }else{
           		alert("删除失败！");
           	}
      	  }
       });
       */
	
}







