<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta name="description" content="">
      <meta name="author" content="">

      <link rel="icon" href="../../favicon.ico">
      <title>Login</title>

      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-logo">
        <div class="logo">
        <img src="images/upsms-logo.jpg">
        </div>
    </div>

    <div class="container-form">
        <div class="container-form2">

          <form action="backend/login.php" method="POST" name="login">
            <input type="text" name="email" class="form-control" placeholder="Email Address" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="checkbox"><label><input type="checkbox" value="remember-me"> Remember me </label></div>
            <div class="loginbutton"><input type="submit" button class="btn btn-lg btn-block btn-login"></div>
          </form>

        </div>
    </div>

    <?php 
      if(!empty($_SESSION['errMsg'])){ ?>
        <div class="alert alert-danger center-block" style="margin-top:20px; width:35%">
          <center><strong>Invalid! </strong><?php echo $_SESSION['errMsg']; ?></center>
        </div>
    
    <?php unset($_SESSION['errMsg']); }?>
    
  </body>
</html>
