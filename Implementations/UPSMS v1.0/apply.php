<?php
  /* Connect to database */
    $conn = new mysqli("localhost","root","","cs192upsms");
  /* Checks Connection */
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

/* Start a session and get the session variables defined from user.php */
  session_start();
  $currID = $_SESSION["currentUserID"];
  $selAppID = $_SESSION["selectedAppID"];

  /* Tinsert once Apply button is clicked */
  $date = date('Y-m-d');

  $SQL = "INSERT INTO application (studentID, appDate) SELECT studentID, '$date' FROM student";
  $plswork = mysqli_query($conn, $SQL);
  if($plswork){
  	echo "Successfully updated database";
  }else{
  	die('Error: '.mysqli_error($conn));
  }
  mysqli_close($conn);
  
?>
