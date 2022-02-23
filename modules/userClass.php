<?php
include('db_conn.php');

class user{

	function getuser()
	{
include('db_conn.php');
		
		$sql="SELECT * FROM login WHERE type='user'";
		$result =mysqli_query($con,$sql);
// echo "$sql";exit;
			return $result;
	}
}