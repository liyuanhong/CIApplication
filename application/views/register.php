<!DOCTYPE html>
<?php 
require dirname(__FILE__)."/../libraries/CI_Log.php";

//写入操作日志
$theTime = date('y-m-d h:i:s',time());
$who = "李明";
$where = "从".$_SERVER['HTTP_HOST'];
$doThings = "--访问了用户注册界面";
writeToLog($theTime,$who,$where,$doThings);

?>

<html>
  <head>
    <meta charset="utf-8">
    <script src="<?php echo base_url();?>static/devMS/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>static/devMS/js/jquery.cookie.js"></script>
    <link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>static/dist/css/signin.css" rel="stylesheet">
    <script src="<?php echo base_url();?>static/devMS/js/ie-emulation-modes-warning.js"></script>
    <script src="<?php echo base_url();?>static/devMS/js/register.js"></script>
  </head>

  <body style="background-color: #EEEEFF;">

    <div class="container">

      <div style=" max-width: 330px;padding: 15px;margin: 0 auto;font-size:16px">
        <h3>注册...</h3>
        <input  class="form-control" placeholder="用 户 名" style="padding: 10px;font-size:16px;height:45px;" id="user_name">
        <input  class="form-control" placeholder="登 录 名" style="padding: 10px;font-size:16px;height:45px;" id="login_name">
        <input type="password" class="form-control" placeholder="密 码" style="padding: 10px;font-size:16px;height:45px;" id="password">
        <input type="password" class="form-control" placeholder="确 认 密 码" style="padding: 10px;font-size:16px;height:45px;" id="repassword">
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;" onclick="register()">注 册</button>
        <button class="btn btn-lg btn-default btn-block" type="submit" onclick="javascript:history.back(-1);">取 消</button>
      </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>static/devMS/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  
  
  
</html>
