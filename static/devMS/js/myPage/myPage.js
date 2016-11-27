var host = window.location.host;

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