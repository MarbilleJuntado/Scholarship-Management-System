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
      <!-- <link href="css/login.css" rel="stylesheet"> -->

      <link href="css/style.css" rel="stylesheet">
      

  </head>

  <body>
    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
      <div><header1>UPSMS<header1></div>
      <div>Scholarship Management System</div>
    </div>
    
    <div class="login">
      <form action="backend/login.php" method="POST" name="login">
        <input type="text" name="email" placeholder="Email Address" required autofocus>
        <input type="password" name="password" placeholder="Password">
        <input type="submit">
      </form>
    </div>
     

    <?php 
      if(!empty($_SESSION['errMsg'])){ ?>
        <div class="alert alert-danger center-block" style="margin-top:20px; width:35%">
          <center><strong>Invalid! </strong><?php echo $_SESSION['errMsg']; ?></center>
        </div>
    
    <?php unset($_SESSION['errMsg']); }?>
    
  </body>
</html>
