<!--
 The MIT License (MIT)
 Copyright (c) 2016 UPSMS
 Authors:
   Prototype Front-End Developer: Patricia Regarde
   Front-End and Back-End Developer: Cyan Villarin

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
  Decemeber 10, 2015: Patricia Regarde finished Front End of Protoype for sig.php
  February 10, 2016: Cyan Villarin added the feature of the sig.php being able to read from cs192upsms.sql database.
                     The system is also able to display the contents of the application table from the UI.
  February 11, 2016: Cyan Villarin added the feature of the system that allows the signatory account to accept/reject an
                     application. If accepted, the system will write 1 to status field of the sigstatus table. If rejected,
                     write 0 instead.

  File Creation Date: April 3, 2016
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->

<?php
  /* Connect to database */
    $conn = new mysqli("localhost","root","","cs192upsms");
  /* Checks Connection */
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

/* Start a session and get the session variables defined from sig.php */
  session_start();
  $currID = $_SESSION["currentUserID"];
  $returnedByID = $_GET["returnByID"];
  $selAppID = $_GET["returnReject"];

  $SQL = "DELETE FROM sigreturn WHERE appID = $selAppID and returnedBy = $returnedByID and returnedTo = $currID";
  $plswork = mysqli_query($conn, $SQL);

  $SQL = "DELETE FROM sigstatus WHERE sigID = $currID and applicationID = $selAppID and sStatus = 2";
  $plswork = mysqli_query($conn, $SQL);

  $SQL = "INSERT INTO sigstatus (sigID, applicationID, sStatus) VALUES ($currID, $selAppID, 0)";
  $plswork = mysqli_query($conn, $SQL);

  header("Location: sig.php");
?>
