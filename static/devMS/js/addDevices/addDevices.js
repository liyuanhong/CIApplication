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

	
	host = window.location.host
	url = host + "/ci/index.php/AddDevices/addDevices"
	$.get("http://" + url,{devName:devName,devModel:devModel,devNum:devNum,devPlateform:devPlateform,devOwner:devOwner,devBrand:devBrand,devVersion:devVersion,devCategory:devCategory,devOther:devOther,devComments:devComments,uploadPics:uploadPics},
		function(data){
			alert(data);
			devName = $("#dev_name").val("");
			devModel = $("#dev_model").val("");
			devNum = $("#dev_num").val("");
			devPlateform = $("#dev_plateform").val("");
			devOwner = $("#dev_owner").val("");
			devBrand = $("#dev_brand").val("");
			devVersion = $("#dev_version").val("");
			devCategory = $("#dev_category").val("");
			devOther = $("#dev_other").val("");
			devComments = $("#dev_comments").val("");
		});
})

$('#upload_pic').trigger('click'); 

$("#test").click(function(event){
	upImgs = $(".template-download").length;
	if(upImgs == 0){
		alert("请上传图片");
	}else{
		imgs = $(".name").length;
		for(i=0;i < upImgs;i++){
			//alert($(".name").eq(i).html());
			alert($("[href$='.png']").eq(i*2).attr('download'));
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
		for(i=0;i < upImgs;i++){
			//alert($(".name").eq(i).html());
			uploadPics = uploadPics + "* " + $("[href$='.png']").eq(i*2).attr('download');
		}
	}	
	return uploadPics;
}
