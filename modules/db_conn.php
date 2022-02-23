<?php
session_start();
$_SESSION['name']='admin';
$sname= "localhost";
$uname= "root";
$password = "";

$db_name = "ambulance";

$con = mysqli_connect($sname, $uname, $password, $db_name) ;

if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>