<?php
session_start();
$curl = curl_init();

$personData = json_decode($_REQUEST['data']);
$action = $personData->action;
if ($action == 'verifyotp'){
  $otp = $personData->otp;
  $verify_id = $personData->verid;
// $otp = $_POST['otp'];
// $verify_id = $_SESSION['verify_id'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ap.kaleyra.io/v1/HXAP1682314056IN/verify/validate",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"verify_id\":\"".$verify_id."\",\n\t\"otp\":\"".$otp."\"\n}",
  CURLOPT_HTTPHEADER => array(
    "api-key: Af34dc1802c25989b750ca71f58f59755",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$responseData = json_decode( $response, true  );
$json = [];

if( !empty($responseData['error']) ){
	$json ['success'] = false;
	// $json ['message'] = $responseData['message'];
  $json ['message'] = 'OTP is not verified! Please try again';
} else {
	$json ['success'] = true;
	$json ['message'] = 'OTP verified successfully. Plick click Submit to continue.';
}
}
//encode JSON
  echo json_encode($json);


//echo json_encode( $responseData ); die;

?>