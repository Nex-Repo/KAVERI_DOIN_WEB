<?php 
include('../modules/db_conn.php');

$jasonContents=file_get_contents('php://input');
$data = json_decode($jasonContents);

$from=$data->fromLocation;
$to=$data->toLocation;
$note=$data->Notes;

$sql = "INSERT INTO `apicheck` (`from_loc`,`to_loc`, `note`,'date') VALUES ('$from','$to', '$note',curdate())";

$result = mysqli_query($con,$sql);
			return $result;
?>