<?php
//connecting to the database
define('DB_HOST', 'localhost');
define('DB_NAME', 'cs192upsms');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
//inserting Record to the database
$name = $_POST['name'];
$nationality = $_POST['nationality'];
$gender = $_POST['gender'];
$birth = $_POST['birth'];
$place = $_POST['place'];
$present = $_POST['present'];
$permanent = $_POST['permanent'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$degree = $_POST['degree'];
$sn = $_POST['sn'];
$college = $_POST['college'];
$dept = $_POST['dept'];

$query = "INSERT INTO user(name, nationality, gender, birth, place, present, permanent, contact, email, degree, sn, college, dept)VALUES('$name', '$nationality', '$gender', '$birth', '$place', '$present', '$permanent', '$contact', '$email', '$degree', '$sn', '$college', '$dept')";
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
