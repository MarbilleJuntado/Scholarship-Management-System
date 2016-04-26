<?php
    function getStudents()
    {
        $DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "password");

        $STH = $DBH->prepare("SELECT * FROM student ORDER BY lastName");

        $STH->execute();
        $students = $STH->fetchAll(PDO::FETCH_OBJ);

        $DBH = null;

        return $students;
    }
?>
