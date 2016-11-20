var host = window.location.host;

//删除一个用户
function delAnUser(e){
	e = e || window.event;
	butId = e.target.id;
	id = butId.substring(4);
	
	$.ajax({
        type: "post",
        url: "http://" + host + "/ci/index.php/ManUserCnt/delAnUser",
        data: {"id":id},
        success: function (result) {
          if(result == "sucess"){
            	alert("删除成功！");
            	location.reload(); 
            }else{
           		alert("删除失败");
           	}
      	  }
       });
}