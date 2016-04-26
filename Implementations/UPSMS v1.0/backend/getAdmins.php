<?php
    function getAdmins()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "password");

        $STH = $DBH->prepare("SELECT * FROM admin ORDER BY lastName");

        $STH->execute();
        $admins = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $admins;
    }
?>
