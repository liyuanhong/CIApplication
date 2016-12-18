var host = window.location.host;

//显示文件夹里有，但是数据库米面没有的图片
function showExtPics(e){
	e = e || window.event;
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/manPicCnt/getExtImgsEcho",
        data: {},
        success: function (result) {
          //window.location.href="http://" + host + "/index.php/Welcome/otherToolsPage/getExtImgsEcho"; 
          var url = "http://" + host + "/index.php/Welcome/otherToolsPage/getExtImgsEcho"; 
      	  session = $.cookie('session');
      	  data = {session:session};
      	  post(url,data);
      	  }
       });
}

//显示数据库和文件夹里面的图片数
function showPicCnt(e){
	e = e || window.event;
	
	var url = "http://" + host + "/index.php/Welcome/otherToolsPage/showPicCnt"; 
 	session = $.cookie('session');
 	data = {session:session};
 	post(url,data);
}

//删除文件夹里面有但是数据库里面没有的图片
function delExtPics(e){
	e = e || window.event;
	
	$.ajax({
        type: "get",
        url: "http://" + host + "/index.php/manPicCnt/delExtImgs",
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