<?php
include('modules/driverClass.php');
$newdriver = new driver;
$id=$_REQUEST['id'];
$result=$newdriver->deleteDriver($id);
header('Location:view_drivers.php');
?>