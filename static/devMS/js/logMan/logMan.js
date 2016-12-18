//以post方式请求哪一天的日志
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

/**
//查询日志按钮事件
$("#search_log").click(function(event){
	date_input = $("#date_input").val();
	var host = window.location.host;
	url = host + "/index.php/Welcome/logMan/"
	//location.href = "http://" + url + date_input;
	post("http://" + url,{date_input:date_input})
})

//查询日志按钮事件
$("#search_log2").click(function(event){
	from_date_input = $("#from_date_input").val();
	to_date_input = $("#to_date_input").val();
	key_word = $("#key_word").val();
	alert(from_date_input + "****" +  to_date_input + "****" + key_word);
	
	var host = window.location.host;
	url = host + "/index.php/Welcome/logMan/";
	post("http://" + url,{from_date_input:from_date_input,to_date_input:to_date_input,key_word:key_word});
})
*/

function searchLog(e){
	date_input = $("#date_input").val();
	session = $.cookie('session');
	var host = window.location.host;
	url = host + "/index.php/Welcome/logMan/";
	//location.href = "http://" + url + date_input;
	post("http://" + url,{date_input:date_input,session:session});
}



function searchLog2(e){
	from_date_input = $("#from_date_input").val();
	to_date_input = $("#to_date_input").val();
	key_word = $("#key_word").val();
	session = $.cookie('session');
	//alert(from_date_input + "****" +  to_date_input + "****" + key_word);
	
	var host = window.location.host;
	url = host + "/index.php/Welcome/logMan/";
	post("http://" + url,{from_date_input:from_date_input,to_date_input:to_date_input,key_word:key_word,session:session});
}

//查询日志按钮事件
$("#search_log2").click(function(event){
	from_date_input = $("#from_date_input").val();
	to_date_input = $("#to_date_input").val();
	key_word = $("#key_word").val();
	alert(from_date_input + "****" +  to_date_input + "****" + key_word);
	
	var host = window.location.host;
	url = host + "/index.php/Welcome/logMan/";
	post("http://" + url,{from_date_input:from_date_input,to_date_input:to_date_input,key_word:key_word});
})