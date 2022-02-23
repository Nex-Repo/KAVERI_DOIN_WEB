<?php


class dashboard{

	function getTotBooking()
	{
		include('db_conn.php');
		$sql="SELECT SUM(CASE WHEN status='Accepted' THEN 1 ELSE 0 END) as tot_acc, SUM(CASE WHEN status='Cancelled' THEN 1 ELSE 0 END) as tot_canc FROM user ";
		$result = mysqli_query($con,$sql);

			return $result;
	}

	function getTodayBooking()
	{
		include('db_conn.php');

		date_default_timezone_set('Asia/Calcutta');
		$date=date("Y-m-d");
		include('db_conn.php');
		$sql="SELECT count(*) FROM `user` where `date` >=$date and `date` < DATE_ADD(DATE($date),INTERVAL 1 DAY)";
		$result = mysqli_query($con,$sql);

			return $result;
	}

	function getVehicle()
	{
		include('db_conn.php');
		$sql="SELECT count(*) FROM driver ";
		$result = mysqli_query($con,$sql);

			return $result;
	}
	function getClient()
	{
		include('db_conn.php');
		$sql="SELECT count(*) FROM login where type='user' ";
		$result = mysqli_query($con,$sql);

			return $result;
	}

		function getWeekData()
	{
		date_default_timezone_set('Asia/Calcutta');
		$date=date("Y-m-d");
		include('db_conn.php');
		$sql="select sum(case when status='Accepted' THEN 1 ELSE 0 end) as acc,sum(case WHEN status='cancelled' THEN 1 ELSE 0 end) as canc,DATE(`date`) from user where `date` > '$date' - INTERVAL 7 day group by DATE(`date`)";
		$result = mysqli_query($con,$sql);

			return $result;
	}

}
