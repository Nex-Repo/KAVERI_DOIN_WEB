<?php 
include('../modules/db_conn.php');

$jasonContents=file_get_contents('php://input');
$data = json_decode($jasonContents);

$name=$data->name;
$password=$data->password;
$contactNo=$data->contactNo;
$address=$data->address;
$email=$data->email;

$sql = "INSERT INTO `login` (`name`,`password`, `contact_no`,`address`,`email`,`type`) VALUES ('$name','$password', '$contactNo','$address', '$email','user')";
echo $sql;
// $result = mysqli_query($con,$sql);
			return $result;
?>