<?
include('../modules/notifyClass.php');

$newnotify = new usernotify;

$page=$_REQUEST['pagename'];
// echo "$page";

if($page == 'notification')
{
$result=$newnotify->updatenotify($_REQUEST['id']);
}

if ($page == 'editbooking') {
  // print_r($_REQUEST);exit;
  $id=$_REQUEST['id'];
  $name=$_REQUEST['name'];
  $phone=$_REQUEST['user_num'];
  $mobile=$_REQUEST['mobile'].' / '.$phone;
  $patient=$_REQUEST['patient_name'];
  $datetime=explode(" ", $_REQUEST['date']);

  $date=$datetime[0];
  $time=$datetime[1];
  $pickup=$_REQUEST['pickup'];
  $drop=$_REQUEST['drop_point'];
  $driver=explode("|", $_REQUEST['driver']);
  $status=$_REQUEST['status'];
  $driver_id=$driver[0];
  $driver_name=$driver[1];
  $driver_no=$driver[2];

$result=$newnotify->updatebooking($id,$pickup,$drop,$driver_id,$status);

if($status=='Accepted'){
$message="Hello $driver_name
$patient is patient booked our service at $time and the contact no:$mobile
Pickup point: $pickup
Drop point: $drop
Please call that mentioned number to confirm loaction";

$api_key = '56052F32CD83D8';
$contacts = '8861480470';
$from = 'KAVAMB';
$sms_text = urlencode($message);

//Submit to server

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=0&routeid=9&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text."&template_id=1207161960307597509");
$response = curl_exec($ch);
// curl_close($ch);
// echo $response;
$err = curl_error($ch);
curl_close($ch);

// $fields = array(
//     "message" => "$message",
//     "language" => "english",
//     "route" => "v3",
//     "numbers" => "$driver_no",
// );

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_SSL_VERIFYHOST => 0,
//   CURLOPT_SSL_VERIFYPEER => 0,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => json_encode($fields),
//   CURLOPT_HTTPHEADER => array(
//     "authorization: e1gs54Ajiarcz2RZ9PmWKbLhlpFNfHJ0XI3VD7UkMwCEq6OYvdwSIb8mvDh0qo9upkjMaTgJKfds6zF7",
//     "accept: */*",
//     "cache-control: no-cache",
//     "content-type: application/json"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}

}
header('Location:../bookingSummary.php');
?>