var host = window.location.host;

function showExtPics(e){
	e = e || window.event;
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/manPicCnt/getExtImgsEcho",
        data: {},
        success: function (result) {
          //window.location.href="http://" + host + "/ci/index.php/Welcome/otherToolsPage/getExtImgsEcho"; 
          var url = "http://" + host + "/ci/index.php/Welcome/otherToolsPage/getExtImgsEcho"; 
      	  session = $.cookie('session');
      	  data = {session:session};
      	  post(url,data);
      	  }
       });
}

function delExtPics(e){
	e = e || window.event;
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/manPicCnt/delExtImgs",
        data: {},
        success: function (result) {
          if(result == "sucess"){
        	  alert("清除成功，页面将刷新！");
        	  location.reload(); 
            }else{
           		alert("清除失败！");
           	}
      	  }
       });
}