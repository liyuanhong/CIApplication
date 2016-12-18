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
            url: "http://" + host + "/index.php/ManageDev/applyForDev",
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
        url: "http://" + host + "/index.php/ManageDev/cancleApplyForDev",
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
	session = $.cookie('session');
	var url = "http://" + host + "/index.php/Welcome/searchDevices/" + deviceId;
	data = {session:session};
	post(url,data);
	//window.location.href="http://" + host + "/index.php/Welcome/searchDevices/" + deviceId;
}

function searchDevs(e){
	e = e || window.event;
	id = e.target.id;
	session = $.cookie('session');
	
	dev_plateform = $("#dev_plateform").val();
	dev_brand = $("#dev_brand").val();
	dev_version = $("#dev_version").val();
	dev_status = $("#dev_status").val();
	dev_category = $("#dev_category").val();
	borrower = $("#borrower").val();
	
	var url = host + "/index.php/Welcome/searchDevices";
	//window.location.href="http://" + url;
	data = {plateform:dev_plateform,brand:dev_brand,version:dev_version,status:dev_status,category:dev_category,borrower:borrower,session:session};
	post("http://" + url,data);
	
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
