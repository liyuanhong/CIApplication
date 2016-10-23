$("#dev_add_but").click(function(event){
	devName = $("#dev_name").val();
	devModel = $("#dev_model").val();
	devNum = $("#dev_num").val();
	devPlateform = $("#dev_plateform").val();
	devOwner = $("#dev_owner").val();
	devBrand = $("#dev_brand").val();
	devVersion = $("#dev_version").val();
	devCategory = $("#dev_category").val();
	devOther = $("#dev_other").val();
	devComments = $("#dev_comments").val();
	
	uploadPics = getUploadPics();

	if(devName == "" || devNum == ""){
		alert("设备名和设备编号不能为空");
	}else{
		host = window.location.host;
		url = host + "/ci/index.php/AddDevices/addDevices";
		$.get("http://" + url,{devName:devName,devModel:devModel,devNum:devNum,devPlateform:devPlateform,devOwner:devOwner,devBrand:devBrand,devVersion:devVersion,devCategory:devCategory,devOther:devOther,devComments:devComments,uploadPics:uploadPics},
			function(data){
				if(data == "sucess"){
					alert("设备添加成功！！！");
					/*
					devName = $("#dev_name").val("");
					devModel = $("#dev_model").val("");
					devNum = $("#dev_num").val("");
					devPlateform = $("#dev_plateform").val("android");
					devOwner = $("#dev_owner").val("");
					devBrand = $("#dev_brand").val("");
					devVersion = $("#dev_version").val("");
					devCategory = $("#dev_category").val("手机和平板");
					devOther = $("#dev_other").val("");
					devComments = $("#dev_comments").val("");
					*/
					//var host = window.location.host;
					//var url = host + "/ci/index.php/Welcome/addDevices";
					//window.location.href="http://" + url;
					location.reload(); 
				}else{
					alert("设备添加失败！！！");
				}
				
			});
	}
	
})

$('#upload_pic').trigger('click'); 

$("#test").click(function(event){
	upImgs = $(".template-download").length;
	if(upImgs == 0){
		alert("请上传图片");
	}else{
		imgs = $(".name").length;
		p = 0;
		j = 0;
		for(i=0;i < upImgs;i++){
			//alert($(".name").eq(i).html());
			if(typeof($("[href$='.png']").eq(p*2).attr('download')) != "undefined"){
				alert($("[href$='.png']").eq(p*2).attr('download'));
				p++;
			}else if(typeof($("[href$='.jpg']").eq(j*2).attr('download')) != "undefined"){
				alert($("[href$='.jpg']").eq(j*2).attr('download'));
				j++;
			}else{
				alert("请上传jpg或png格式的图片");
			}
			//alert($("[href$='.png']").eq(i*2).attr('download'));
		}
	}	
})
//获取已经上传的图片
function getUploadPics(){
	uploadPics = "";
	upImgs = $(".template-download").length;
	if(upImgs == 0){
		return uploadPics;
	}else{
		imgs = $(".name").length;
		p = 0;
		j = 0;
		
		for(i=0;i < upImgs;i++){
			//alert($(".name").eq(i).html());
			//拼接字符串
			//uploadPics = uploadPics + "* " + $("[href$='.png']").eq(i*2).attr('download');
			if(typeof($("[href$='.png']").eq(p*2).attr('download')) != "undefined"){
				uploadPics = uploadPics + "* " + $("[href$='.png']").eq(p*2).attr('download');
				p++;
			}else if(typeof($("[href$='.jpg']").eq(j*2).attr('download')) != "undefined"){
				uploadPics = uploadPics + "* " + $("[href$='.jpg']").eq(j*2).attr('download');
				j++;
			}else{
				//alert("请上传jpg或png格式的图片");
			}
		}
	}	
	return uploadPics;
}
