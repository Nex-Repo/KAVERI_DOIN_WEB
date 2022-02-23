<?
include('../modules/driverClass.php');

// print_r($_REQUEST);
// exit;
$name=$_REQUEST['name'];
$vehicle=$_REQUEST['vehicle'];
$add1=$_REQUEST['add1'];
$add2=$_REQUEST['add2'];
$phone=$_REQUEST['phone'];
$mobile=$_REQUEST['mobile'];
$gender=$_REQUEST['gender'];
$page=$_REQUEST['page'];
$newdriver = new driver;
$newdriver->setName($name);
$newdriver->setVehicle($vehicle);
$newdriver->setAdd1($add1);
$newdriver->setAdd2($add2);
$newdriver->setPhone($phone);
$newdriver->setMobile($mobile);
$newdriver->setGender($gender);

if($page=='addDriver')
{
$result=$newdriver->addDriver();
}
elseif($page=='editDriver')
{
$id=$_REQUEST['id'];

$result=$newdriver->updateDriver($id);

}
header('Location:../view_drivers.php');


?>