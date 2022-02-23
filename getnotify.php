<?php
include('modules/notifyClass.php');
$newnotify = new usernotify;

$result=$newnotify->getsound();
$sound=mysqli_fetch_array($result);
if(isset($sound[0]))
{
$result=$newnotify->updatesound($sound[0]);
$arr=array("sound"=>"yes");
echo json_encode($arr);
}
else{
	$arr=array("sound"=>"no");
echo json_encode($arr);
}
?>