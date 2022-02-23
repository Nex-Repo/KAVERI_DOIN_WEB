<?php 
include('../modules/db_conn.php');
// echo "accessing api\n";
date_default_timezone_set('Asia/Calcutta');
$date=date("Y-m-d H:i:s");
$jasonContents=file_get_contents('php://input');
$data = json_decode($jasonContents);
$data1=array();
$id=$data->userid;
$name=$data->name;
$mobile=$data->mobile;
$from=$data->fromLocation;
$to=$data->toLocation;
$note=$data->Notes;
// echo $data->userid;
$check="SELECT `name`,`mobile`,`pickup`,`drop_point`,`status`,`date`,`notes` from `user` where `link2user`='$id' order by id desc";
// echo $check;
$checkres=mysqli_query($con,$check);
// echo ($checkres);
$res=mysqli_fetch_array($checkres);
$row = mysqli_num_rows($checkres);

if($res[4]!='Cancelled' && $res[4]!='Successful' && $row > 0)
{
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
   echo json_encode($data1);
}
else{
$sql = "INSERT INTO `user` (`link2user`,`name`, `mobile`,`pickup`,`drop_point`,`notes`,`sound_flag`,`notify_flag`,`date`,`status`) VALUES ('$id','$name', '$mobile','$from','$to', '$note','0','0','$date','Pending')";
// echo $sql;
$result = mysqli_query($con,$sql);
if($result)
{
    $data= array("message"=>"Pending","key"=>0);
    echo json_encode($data);
}
}
// header('Content-type: application/json');
            return json_encode($data);
?>