<?php


class driver{

function setName($name) {
           $this->name = $name;
    }

function setVehicle($vehicle) {
           $this->vehicle = $vehicle;
    }
function setAdd1($add1) {
           $this->add1 = $add1;
    }

function setAdd2($add2) {
       $this->add2 = $add2;
	}

function setPhone($phone) {
       $this->phone = $phone;
	}

function setMobile($mobile) {
       $this->mobile = $mobile;
	}
function setGender($gender) {
       $this->gender = $gender;
	}



	function addDriver()
	{
include('db_conn.php');

		$name =$this->name;
		$vehicle =$this->vehicle;
		$add1 =$this->add1;
		$add2 =$this->add2;
		$phone =$this->phone;
		$mobile =$this->mobile;
		$gender =$this->gender;
		$sql="INSERT INTO `driver`(`name`, `vehicle`, `address1`, `address2`, `phone`, `mobile`, `gender`) VALUES ('$name','$vehicle','$add1','$add2','$phone','$mobile','$gender')";
		// echo $sql;
		// exit;

			$result = mysqli_query($con,$sql);

			return $result;

	}

	function getDriver()
	{
include('db_conn.php');

		$sql="SELECT id,name,vehicle,phone FROM driver";
		$result = mysqli_query($con,$sql);

			return $result;

	}

	function fetchDriver($id)
	{
include('db_conn.php');

		$sql="SELECT * FROM driver where id=$id";
		$result = mysqli_query($con,$sql);

			return $result;

	}

	function updateDriver($id)
	{
include('db_conn.php');

		$name =$this->name;
		$vehicle =$this->vehicle;
		$add1 =$this->add1;
		$add2 =$this->add2;
		$phone =$this->phone;
		$mobile =$this->mobile;
		$gender =$this->gender;
		$sql="UPDATE driver SET name='$name',vehicle='$vehicle',address1='$add1',address2='$add2',phone='$phone',mobile='$mobile',gender='$gender' where id=$id";
		// echo "$sql";
		// exit;
		$result = mysqli_query($con,$sql);

			return $result;
	}

	function deleteDriver($id)
	{
include('db_conn.php');
		
		$sql="DELETE FROM driver WHERE id='$id'";
		// echo $sql;
		// exit();
		$result = mysqli_query($con,$sql);

			return $result;
	}

}
?>