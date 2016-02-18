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
  February 16, 2016: Patricia Regarde added the feature of the system that allows the admin account to accept/reject an
                     application. If accepted, the system will write 1 to status field of the application table. If rejected,
                     write 2 instead.
  February 18, 2016: Patricia Regarde finished the accept feature. System can now also write the information of the student and
                     his/her respective scholarship in the studentscholarship table.

  File Creation Date: February 16, 2016
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->


<?php
	session_start();
	
		/*Open a connection to mySQL*/
		$DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "password");

		/*If the accept button was clicked*/
		if ($_POST['accrej'] == 'Accept'){
			/*For each ticked checkbox*/
			foreach($_POST['studID'] as $id){
				if(isset($_POST["acceptreject{$id}"])){
					$student = $_POST["acceptreject{$id}"];
					$scholarship = $_POST["scholarshipID{$id}"];

					$data = array('student' => $student);
					/*Update the status in the application table*/
					$STH = $DBH->prepare("UPDATE application SET status = 1 WHERE studentID = :student");
					
					$STH->execute($data);		
		
					/*Insert data to studentscholarship table*/
					$row = $DBH->lastInsertId();
					$data = array('studentID' => $student, 'scholarshipID' => $scholarship);
					$STH = $DBH->prepare("INSERT INTO studentscholarship (studentID, scholarshipID, startDate, endDate) VALUES (:studentID, :scholarshipID, NOW(), DATE_ADD(NOW(), INTERVAL 1 YEAR))");
					
					$STH->execute($data);

				}
			}
		}

		/*If the reject button was clicked*/
		else {
			foreach($_POST['studID'] as $id){
				if(isset($_POST["acceptreject{$id}"])){
					$student = $_POST["acceptreject{$id}"];

					$data = array('student' => $student);
					/*Update the status in the application table*/
					$STH = $DBH->prepare("UPDATE application SET status = 2 WHERE studentID = :student");
					$STH->execute($data);
				}
			}
		}
		
		$DBH = null;
		/*Return to homepage*/
		header("Location: ../admin.php");
			
?>
