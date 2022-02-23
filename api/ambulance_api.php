<?php 
include('../modules/db_conn.php');
// echo "accessing api\n";
date_default_timezone_set('Asia/Calcutta');
$date=date("Y-m-d H:i:s");
$data1=array();


$check="SELECT `id`,`name`,`images`,`price` from `ambulance`";

$checkres=mysqli_query($con,$check);
// echo ($checkres);
$res=mysqli_fetch_array($checkres);


     $data1['id']=$res[0];
    $data1['name']=$res[1];
    $data1['images']=$res[2];
    $data1['price']=$res[3];
  
   echo json_encode($data1);


header('Content-type: application/json');
			return json_encode($data);
?>