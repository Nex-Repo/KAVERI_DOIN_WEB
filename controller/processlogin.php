<?php
session_start();

include('../modules/loginClass.php');

$user=$_REQUEST['username'];

$pass=$_REQUEST['password'];

$newlogin = new userlogin;


$result=$newlogin->login($user,$pass);
$res=mysqli_fetch_array($result);
$_SESSION["id"] = $res['id'];
$_SESSION["user"] = $res['user_name'];
// print_r($res);
if($res['type'] == 'admin' && isset($_SESSION["user"]))
{
	header("Location:../dashboard.php");
}
else
{
echo "<script>alert('admin username and password not matched')</script>";

	header("Refresh:0.1; url='../index.php'");

}

?>