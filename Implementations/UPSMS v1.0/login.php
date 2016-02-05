<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == 'user@up.edu.ph' && $password == 'user'){
      header("Location: user.html");;
    }
    elseif ($email == 'sig@up.edu.ph' && $password == 'sig') {
      header("Location: sig.html");
    }
    elseif ($email == 'admin@up.edu.ph' && $password == 'admin'){
    	header("Location: admin.html");
    }
    else {
      header("Location: error.html");
    }
?>
