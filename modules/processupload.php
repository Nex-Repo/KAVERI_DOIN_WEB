<?php

$file=$_FILES["UploadFileName"]["tmp_name"];

// print_r($file);
 $path=str_replace("\\","/",$file);
   if(isset($path)) {  
    $handle= fopen("$path", "r");
    $header = fgetcsv($handle,1000,",");
   

    if($header){
        $header_sql = array();
        foreach($header as $h){
            $h=trim($h);
            $header_sql[] = '`'.$h.'` VARCHAR(255)';
        }
	include('db_conn.php');
	// $data = fgetcsv($handle,1000,",");
	// print_r($data);
while($data = fgetcsv($handle,1000,",")){ 
	$sql="INSERT INTO `driver`(`name`, `vehicle`, `address1`, `address2`, `phone`, `mobile`, `gender`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
	// echo $sql;
	$result = mysqli_query($con,$sql);

}
}
}

header("location:../view_drivers.php");

?>