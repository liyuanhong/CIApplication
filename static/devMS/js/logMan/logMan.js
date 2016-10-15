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

$("#search_log").click(function(event){
	date_input = $("#date_input").val();
	var host = window.location.host;
	url = host + "/ci/index.php/Welcome/logMan/"
	//location.href = "http://" + url + date_input;
	post("http://" + url,{date_input:date_input})
})