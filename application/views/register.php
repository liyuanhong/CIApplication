<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="<?php echo base_url();?>static/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>static/dist/css/signin.css" rel="stylesheet">
    <script src="<?php echo base_url();?>static/devMS/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body style="background-color: #EEEEFF;">

    <div class="container">

      <form class="form-signin" role="form">
        <h3 class="form-signin-heading">注册...</h3>
        <input  class="form-control" placeholder="用 户 名" required autofocus>
        <input  class="form-control" placeholder="登 录 名" required autofocus>
        <input type="password" class="form-control" placeholder="密 码" required>
        <input type="password" class="form-control" placeholder="确 认 密 码" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登 录</button>
        <button class="btn btn-lg btn-default btn-block" type="submit" onclick="javascript:history.back(-1);">取 消</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>static/devMS/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  
  
  
</html>
