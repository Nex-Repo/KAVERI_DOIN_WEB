<?php 
include('../modules/db_conn.php');

$jasonContents=file_get_contents('php://input');
$data_api = json_decode($jasonContents);
$data=array();
$data1=array();

$id=$data_api->userid;

$sql = "SELECT `name`,`mobile`,`pickup`,`drop_point`,`date`,`status`,`notes` FROM `user` WHERE link2user=$id";

$result = mysqli_query($con,$sql);

while($res=mysqli_fetch_array($result))
{
    $data['name']=$res[0];
    $data['mobile']=$res[1];
    $data['fromLoc']=$res[2];
    $data['toLoc']=$res[3];
    $data['date']=$res[4];
    $data['status']=$res[5];
    $data['notes']=$res[6];
    array_push($data1,$data);
}
header('Content-type: application/json');
echo json_encode($data1);
?>