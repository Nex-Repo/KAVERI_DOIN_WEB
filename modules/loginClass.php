<?php


class userlogin{


	function login($user,$pass)
	{
		include('db_conn.php');
		$sql="SELECT id,user_name,password,type FROM login WHERE user_name='$user' AND password='".md5($pass)."'";
		// echo $sql;

			$result = mysqli_query($con,$sql);

			return $result;

	}

}
?>