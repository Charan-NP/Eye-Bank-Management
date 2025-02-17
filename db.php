<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "eye_project1";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if($con->connect_error)
{
	die("failed to connect!".$con->connect_error);
}
?>
