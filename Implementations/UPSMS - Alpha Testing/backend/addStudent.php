<!--
 The MIT License (MIT)
 Copyright (c) 2016 UPSMS
 Authors:
   Back-End Developer: Patricia Regarde

 Permission is hereby granted, free of charge, to any person obtaining a copy
 of this software and associated documentation files (the "Software"), to deal
 in the Software without restriction, including without limitation the rights
 to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the Software is
 furnished to do so, subject to the following conditions:
 The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 SOFTWARE.

 This is a course requirement for CS 192 Software Engineering II under the
 supervision of Asst. Prof. Ma. Rowena C. Solamo of the Department of Computer
 Science, College of Engineering, University of the Philippines, Diliman for
 the AY 2015-2016

 Code History:
  March 17, 2016: Patricia Regarde added the feature of adding new student users to the database.

  File Creation Date: March 17, 2016
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->
<?php
  session_start();

  try
  {
    $DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "");

    if ($_POST['studButton'] == 'Submit'){
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mail = $_POST['mail'];
      $college = $_POST['college'];
      $dept = $_POST['dept'];


      foreach($fname as $a => $b){
        $name1 = $fname[$a];
        $name2 = $mname[$a];
        $name3 = $lname[$a];
        $email = $mail[$a];
        $collegeID = $college[$a];
        $dep = $dept[$a];

        $data = array('collegeID' => $collegeID);

        $STH = $DBH->prepare("SELECT * FROM college WHERE collegeID = :collegeID");
        $STH->execute($data);

        $collname = $STH->fetchAll(PDO::FETCH_OBJ);

        echo $collname[0]->name;

        $data = array('firstName' => $name1, 'middleName' => $name2, 'lastName' => $name3, 'upMail' => $email, 'college' => $collname[0]->name, 'dept' => $dep);
        $STH = $DBH->prepare("INSERT INTO student (firstName, middleName, lastName, upMail, college, dept) VALUES (:firstName, :middleName, :lastName, :upMail, :college, :dept)");
        $STH->execute($data);

      }
    }

    else if ($_POST['studButton'] == 'Delete'){
          
          $data = array('id' => $_SESSION['student']);

          $STH = $DBH->prepare("DELETE FROM student WHERE studentID = :id");
          $STH->execute($data);
        
      }
    

    else{
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mail = $_POST['mail'];
      $college = $_POST['college'];
      $dept = $_POST['dept'];
      $id = $_SESSION['student'];

      foreach($fname as $a => $b){
        $name1 = $fname[$a];
        $name2 = $mname[$a];
        $name3 = $lname[$a];
        $email = $mail[$a];
        $collegeID = $college[$a];
        $dep = $dept[$a];

        $data1 = array('collegeID' => $collegeID);

        $STH = $DBH->prepare("SELECT * FROM college WHERE collegeID = :collegeID");
        $STH->execute($data1);

        $collname = $STH->fetchAll(PDO::FETCH_OBJ);

        $data = array('firstName' => $name1, 'middleName' => $name2, 'lastName' => $name3, 'upMail' => $email, 'college' => $collname[0]->name, 'dept' => $dep, 'id' => $id);
        $STH = $DBH->prepare("UPDATE student SET firstName = :firstName, middleName = :middleName, lastName = :lastName, upMail = :upMail, college = :college, dept = :dept WHERE studentID = :id");
        $STH->execute($data);

      }




    }

   $DBH = null;
   header('Location: ../tempAdStudent.php');
    
    
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
?>