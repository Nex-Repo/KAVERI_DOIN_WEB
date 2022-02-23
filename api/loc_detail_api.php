<?php 
include('../modules/db_conn.php');

$sql = "SELECT * FROM `apicheck`";
$result = mysqli_query($con,$sql);

			return $result;
?>