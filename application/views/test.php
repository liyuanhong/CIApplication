<script src="<?php echo base_url();?>static/devMS/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
var host = window.location.host;
function getPics(){
	$.ajax({
        type: "get",
        url: "http://" + host + "/ci/index.php/Welcome/getPics?file=IMG_0006.jpg",
        data: {},
        success: function (result) {
          	alert("sucess");
      	  }
       });
}
 
</script>


<button type="button" class="btn btn-success" onclick="getPics()">test</button>