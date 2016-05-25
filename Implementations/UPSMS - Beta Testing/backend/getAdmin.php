<?php
    function getAdmin()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "");
		$data = array('id' => $_SESSION['admin']);


        $STH = $DBH->prepare("SELECT * FROM admin WHERE adminID = :id");

        $STH->execute($data);
        $admins = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $admins[0];
    }
?>
