<?php
//connecting to the database
define('DB_HOST', 'localhost');
define('DB_NAME', 'cs192upsms');
define('DB_USER','root');
define('DB_','');

$con=mysql_connect(DB_HOST,DB_USER,DB_) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

session_start();
$currID = $_SESSION["currentUserID"];
$selAppID = $_SESSION["selectedAppID"];


//inserting Record to the database

$upMail = $_POST['upMail'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleName = $_POST['middleName'];
$nationality = $_POST['nationality'];
$gender = $_POST['gender'];
$birthDate = $_POST['birthDate'];
$birthPlace = $_POST['birthPlace'];
$presStreetAddr = $_POST['presStreetAddr'];
$presMunBrgy = $_POST['presMunBrgy'];
$presProvCity = $_POST['presProvCity'];
$presRegion = $_POST['presRegion'];
$permStreetAddr = $_POST['permStreetAddr'];
$permMunBrgy = $_POST['permMunBrgy'];
$permProvCity = $_POST['permProvCity'];
$permRegion = $_POST['permRegion'];
$contactNo = $_POST['contactNo'];
$dept = $_POST['dept'];
$college = $_POST['college'];

$query = "INSERT INTO student (upMail, firstName, lastName, middleName, nationality, gender, birthDate, birthPlace, presStreetAddr,
	presMunBrgy, presProvCity, presRegion, permStreetAddr, permMunBrgy, permProvCity, permRegion, contactNo, dept, college) VALUES('$upMail', '$firstName', '$middleName', '$lastName', '$nationality', '$gender', '$birthDate', '$birthPlace', '$presStreetAddr', '$presMunBrgy',
'$presProvCity', '$presRegion', '$permStreetAddr', '$permMunBrgy', '$permProvCity', '$permRegion', '$contactNo', '$dept', '$college')";
$result = mysql_query($query);

if($result)
	{
	    echo "Successfully updated database";
	}
	else
	{
	 die('Error: '.mysql_error($con));
	}
	mysql_close($con);
?>
