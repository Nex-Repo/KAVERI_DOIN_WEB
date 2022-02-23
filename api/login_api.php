<?php 
include('../modules/db_conn.php');

$jasonContents=file_get_contents('php://input');
$data_api = json_decode($jasonContents);
$data=array();
// $name=$data->contactNo;
$password=$data_api->password;
$contactNo=$data_api->contactNo;


$sql = "SELECT id FROM `login` where contact_no='$contactNo' and password=md5('$password')";

$result = mysqli_query($con,$sql);

if($result)
{
    $res=mysqli_fetch_array($result)
    $data['id']=$res[0];
    $data['message']="successful";
}
else{
    $data['message']="failed";

}
    
header('Content-type: application/json');

// $data2= str_replace("\"", "",json_encode($data1,JSON_HEX_APOS));
echo json_encode($data);
?>