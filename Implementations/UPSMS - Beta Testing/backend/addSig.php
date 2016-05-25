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
  March 15, 2016: Patricia Regarde added the feature of adding new signatory users to the database.

  File Creation Date: March 15, 2016
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->
<?php
  session_start();
  try
  {
    $DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "");

    if($_POST['sigButton'] == 'Submit'){
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mail = $_POST['mail'];
      $pos = $_POST['position'];



      foreach($fname as $a => $b){
        $name1 = $fname[$a];
        $name2 = $mname[$a];
        $name3 = $lname[$a];
        $email = $mail[$a];
        $posi = $pos[$a];

        $data = array('firstName' => $name1, 'middleName' => $name2, 'lastName' => $name3, 'upMail' => $email, 'position' => $posi);
        $STH = $DBH->prepare("INSERT INTO signatory (firstName, middleName, lastName, upMail, position) VALUES (:firstName, :middleName, :lastName, :upMail, :position)");
        $STH->execute($data);

      }
    }

    else if ($_POST['sigButton'] == 'Delete'){
          
          $data = array('id' => $_SESSION['sig']);

          $STH = $DBH->prepare("DELETE FROM signatory WHERE sigID = :id");
          $STH->execute($data);
        
    }

    else{
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mail = $_POST['mail'];
      $pos = $_POST['position'];
      $id = $_SESSION['sig'];

      foreach($fname as $a => $b){
        $name1 = $fname[$a];
        $name2 = $mname[$a];
        $name3 = $lname[$a];
        $email = $mail[$a];
        $posi = $pos[$a];

        $data = array('firstName' => $name1, 'middleName' => $name2, 'lastName' => $name3, 'upMail' => $email, 'position' => $posi, 'id' => $id);
        $STH = $DBH->prepare("UPDATE signatory SET firstName = :firstName, middleName = :middleName, lastName = :lastName, upMail = :upMail, position = :position WHERE sigID = :id");
        $STH->execute($data);

      }
    }

   $DBH = null;
   header('Location: ../tempAdSig.php');
    
    
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
?>