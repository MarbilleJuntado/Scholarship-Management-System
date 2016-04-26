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
  March 1, 2016: Patricia Regarde added the feature of the system that allows the admin account to delete an
                 existing scholarship.
  March 3, 2016: Patricia Regarde added the add scholarship feature. 

  File Creation Date: March 1, 2016
  Development Group: UPSMS (Marbille Juntado, Patricia Regarder, Cyan Villarin)
  Client Group: Mrs. Rowena Solamo, Dr. Jaime Caro
  Purpose of this software: Our main goal is to implement a system that allows the monitoring of scholarship system within UP System.
-->
<?php
	session_start();
	try{
		/*Open a connection to mySQL*/
		$DBH = new PDO("mysql:host=localhost;dbname=cs192upsms", "root", "");

		/*If the add button was clicked*/
		if($_POST['deladd'] == 'Add'){
			/*Get form data*/
			$name = $_POST['schname'];
			$benefactor = $_POST['benefactor'];
			$deadline = $_POST['appdeadline'];
			$grantees = $_POST['granteesNum'];
			$ordersig = $_POST['selSigList'];

			$ordersig = implode(",", $ordersig);

			$data = array('name' => $name, 'benefactor' => $benefactor, 'deadline' => $deadline, 'grantees' => $grantees, 'order' => $ordersig);
			/*Insert into scholarship table*/
			$STH = $DBH->prepare("INSERT INTO scholarship (name, benefactor, appDeadline, numofGrantees, signatoryOrder) VALUES (:name, :benefactor, :deadline, :grantees, :order)");

			$STH->execute($data);
		}

		else{
			$name = $_POST['schname'];
			$benefactor = $_POST['benefactor'];
			$deadline = $_POST['appdeadline'];
			$grantees = $_POST['granteesNum'];
			$ordersig = $_POST['selSigList'];

			$id = $_POST['schoList'];

			echo $id;

			$ordersig = implode(",", $ordersig);

			$data = array('id' => $id, 'name' => $name, 'benefactor' => $benefactor, 'deadline' => $deadline, 'grantees' => $grantees, 'order' => $ordersig);

			$STH = $DBH->prepare("UPDATE scholarship SET name = :name, benefactor = :benefactor, appDeadline = :deadline, numofGrantees = :grantees, signatoryOrder = :order WHERE scholarshipID = :id");
			$STH->execute($data);
		}

		$DBH = null;
		/*Return to homepage*/
		header("Location: ../admin.php");
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
?>