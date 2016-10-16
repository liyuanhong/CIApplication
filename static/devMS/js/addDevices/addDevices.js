$("#dev_add_but").click(function(event){
	devName = $("#dev_name").val();
	devModel = $("#dev_model").val();
	devNum = $("#dev_num").val();
	devPlateform = $("#dev_plateform").val();
	devWho = $("#dev_who").val();
	devOther = $("#dev_other").val();
	devComments = $("#comments").val();

	host = window.location.host
	url = host + "/ci/index.php/AddDevices/addDevices"
	$.get("http://" + url,{itface:"addDev",devName:devName,devModel:devModel,devNum:devNum,devPlateform:devPlateform,devWho:devWho,devOther:devOther,devComments:devComments},
		function(data){
			alert(data);
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
