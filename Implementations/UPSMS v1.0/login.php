<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == 'user@up.edu.ph' && $password == 'user'){
      header("Location: user.php");;
    }
    elseif ($email == 'sig@up.edu.ph' && $password == 'sig') {
      header("Location: sig.php");
    }
    elseif ($email == 'admin@up.edu.ph' && $password == 'admin'){
    	header("Location: admin.php");
    }
    else {
      header("Location: error.html");
    }
?>
