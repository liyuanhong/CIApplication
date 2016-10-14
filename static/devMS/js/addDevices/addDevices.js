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
	$.get("http://" + url,
		function(data){
			alert(data);
			console.log(data);
		});
})

$('#upload_pic').trigger('click'); 
