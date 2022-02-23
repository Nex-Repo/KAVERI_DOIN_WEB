<?php
include('db_conn.php');

class usernotify{

	function getsound()
	{
include('db_conn.php');
        
		$sql="SELECT id FROM user WHERE sound_flag=0";
		$result = mysqli_query($con,$sql);
// echo "$sql";exit;
			return $result;
	}

	function updatesound($id)
	{
include('db_conn.php');

		$sql="UPDATE user SET sound_flag=1 WHERE id=$id";
		$result = mysqli_query($con,$sql);

			return $result;
	}

	function getnotify()
	{
include('db_conn.php');

		$sql="SELECT id,name,pickup,drop_point,`date` FROM user WHERE notify_flag=0";
		$result = mysqli_query($con,$sql);
// echo "$sql";exit;
			return $result;
	}


function timeAgo($time_ago)
{

	date_default_timezone_set("Asia/Kolkata");

    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}


function updatenotify($id)
	{
include('db_conn.php');

		$sql="UPDATE user SET notify_flag=1";
        // echo "$sql";exit;
		$result = mysqli_query($con,$sql);
			return $result;
	}

	function allnotify()
	{
include('db_conn.php');

		$sql="SELECT u.id,u.name as patient_name,u.pickup,u.drop_point,u.date,u.notify_flag,u.status,l.name,d.name as driver_name,u.mobile FROM login l,user u 
        LEFT JOIN driver d on u.link2driver = d.id
		where u.link2user = l.id
		ORDER BY u.status desc";
		$result = mysqli_query($con,$sql);
// echo "$sql";exit;
			return $result;	
	}

    function fetchBook($id)
    {
include('db_conn.php');

        $sql="SELECT u.id,u.name as patient_name,u.pickup,u.drop_point,u.date,u.notify_flag,u.status,l.name,d.name as driver_name,u.mobile,l.contact_no,d.id as driver_id FROM login l,user u left join driver d on u.link2driver = d.id
        where u.link2user = l.id
        and u.id=$id
        ORDER BY u.status desc";
        $result = mysqli_query($con,$sql);
// echo "$sql";exit;
            return $result; 
    }

    function fetchDriver()
    {
include('db_conn.php');

        $sql="SELECT id,name,phone FROM driver";
        $result = mysqli_query($con,$sql);
// echo "$sql";exit;
            return $result; 
    }

    function updatebooking($id,$pickup,$drop,$driver,$status)
    {
include('db_conn.php');

        $sql="UPDATE user SET pickup='$pickup',drop_point='$drop',link2driver='$driver',status='$status' WHERE id=$id";
        $result = mysqli_query($con,$sql);
// echo "$sql";exit;
            return $result; 
    }
}
?>