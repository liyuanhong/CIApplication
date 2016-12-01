<!DOCTYPE html>
<?php 
require dirname(__FILE__)."/../libraries/CI_Log.php";
require dirname(__FILE__)."/../libraries/CI_Util.php";

//写入操作日志
$theTime = date('y-m-d h:i:s',time());
//$who = "李明";
$who = getMemberFromIP();
$where = "从".$_SERVER['HTTP_HOST'];
$doThings = "--访问了登录界面";
writeToLog($theTime,$who,$where,$doThings);

?>
<html>
  <head>
    <meta charset="utf-8">
    <script src="<?php echo base_url();?>static/devMS/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>static/devMS/js/jquery.cookie.js"></script>
    <link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>static/dist/css/signin.css" rel="stylesheet">
    <script src="<?php echo base_url();?>static/dist/js/ie-emulation-modes-warning.js"></script>
    <script src="<?php echo base_url();?>static/devMS/js/login.js"></script>
  </head>

  <body style="background-color: #EEEEFF;">

    <div class="container">

      <div style=" max-width: 330px;padding: 15px;margin: 0 auto;font-size:16px">
        <h3 class="form-signin-heading">请登录...</h3>
        <input  class="form-control" placeholder="用 户 名" id="user_name" style="padding: 10px;font-size:16px;height:45px;">
        <input type="password" class="form-control" placeholder="密 码" id="password" style="padding: 10px;font-size:16px;height:45px;">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 记住账户
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="login()">登 录</button>
        <button class="btn btn-lg btn-default btn-block" type="submit" onclick="javascript:history.back(-1);">取 消</button>
      </div>

    </div> 

    <script src="<?php echo base_url();?>static/dist/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  
  
  
</html>
