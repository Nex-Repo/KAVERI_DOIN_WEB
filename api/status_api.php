<?php 
include('../modules/db_conn.php');
// echo "accessing api\n";
date_default_timezone_set('Asia/Calcutta');
$date=date("Y-m-d H:i:s");
$jasonContents=file_get_contents('php://input');
$data = json_decode($jasonContents);
$data1=array();
$id=$data->userid;


$check="SELECT `name`,`mobile`,`pickup`,`drop_point`,`status`,`date`,`notes` from `user` where `link2user`='$id' order by id desc";

$checkres=mysqli_query($con,$check);
// echo ($checkres);
$res=mysqli_fetch_array($checkres);
$row = mysqli_num_rows($checkres);


     $data1['name']=$res[0];
    $data1['mobile']=$res[1];
    $data1['fromLoc']=$res[2];
    $data1['toLoc']=$res[3];
    $data1['date']=$res[5];
    $data1['status']=$res[4];
    $data1['notes']=$res[6];
    if($res[4]=='Accepted')
    {
    $data1["key"]=1;
    }
    else if($res[4]=='Pending')
    {
         $data1["key"]=0;
    }
    else if($res[4]=='Cancelled')
    {
    $data1["key"]=2;
    }
    else if($res[4]=='Successful')
    {
    $data1["key"]=3;
    }
   echo json_encode($data1);


header('Content-type: application/json');
			return json_encode($data);
?>