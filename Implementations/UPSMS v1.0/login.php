<?php
    session_start();

    try
    {
        $DBH = new PDO("mysql:host=localhost;dbname=165", "root", "password");

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $data = array('email' => $email);
     
        $STH = $DBH->prepare("SELECT * FROM (SELECT studentID AS ID, upMail, password, 1 AS roleID FROM student UNION SELECT adminID AS ID, upMail, password, 2 AS roleID FROM admin UNION SELECT sigID AS ID, upMail, password, 3 AS roleID FROM signatory) t WHERE upMail = :email");
        $STH->execute($data);
        $users = $STH->fetchAll(PDO::FETCH_OBJ);

        if(isset($users[0]) AND password_verify($pass, $users[0]->password))
        {
            $_SESSION['email'] = $users[0]->upMail;
            //User type -- 1 (student), 2(admin), 3(sig)
            $_SESSION['currentUserTYPE'] = $users[0]->roleID;
            $_SESSION['currentUserID'] = $users[0]->ID;
            $_SESSION['isLoggedIn'] = TRUE;
           
        }

        $DBH = null;

        if ($users[0] == 1) header('Location: ../user.php');
        elseif ($users[0] == 2) header('Location: ../admin.php');
        else header('Location: ../sig.php');
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>