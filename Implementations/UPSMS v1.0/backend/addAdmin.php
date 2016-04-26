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
  March 15, 2016: Patricia Regarde added the feature of adding new admin users to the database.

  File Creation Date: March 15, 2016
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->
<?php
  try
  {
    $DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "password");

    if ($_POST['adminButton'] == 'Submit'){
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mail = $_POST['mail'];



      foreach($fname as $a => $b){
        $name1 = $fname[$a];
        $name2 = $mname[$a];
        $name3 = $lname[$a];
        $email = $mail[$a];

        $data = array('firstName' => $name1, 'middleName' => $name2, 'lastName' => $name3, 'upMail' => $email);
        $STH = $DBH->prepare("INSERT INTO admin (firstName, middleName, lastName, upMail) VALUES (:firstName, :middleName, :lastName, :upMail)");
        $STH->execute($data);

      }
    }

    else if ($_POST['adminButton'] == 'Delete'){
      foreach ($_POST['admnID'] as $id){
        if(isset($_POST["edit{$id}"])){
          $adminID = $_POST["adminID{$id}"];
          
          $data = array('id' => $adminID);

          $STH = $DBH->prepare("DELETE FROM admin WHERE adminID = :id");
          $STH->execute($data);
        }
      }
    }

    else{
      $id = $_POST['adList'];

      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mail = $_POST['mail'];



      foreach($fname as $a => $b){
        $name1 = $fname[$a];
        $name2 = $mname[$a];
        $name3 = $lname[$a];
        $email = $mail[$a];

        $data = array('firstName' => $name1, 'middleName' => $name2, 'lastName' => $name3, 'upMail' => $email, 'id' => $id);
        $STH = $DBH->prepare("UPDATE admin SET firstName = :firstName, middleName = :middleName, lastName = :lastName, upMail = :upMail WHERE adminID = :id");
        $STH->execute($data);

      }
  }
   $DBH = null;
   header('Location: ../admin.php');
    
    
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
?>