<?php
session_start();

$curl = curl_init();
$personData = json_decode($_REQUEST['data']);
$action = $personData->action;
if ($action == 'sendotp'){
  $mobileNumber = '91'.$personData->mobile;

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ap.kaleyra.io/v1/HXAP1682314056IN/verify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"flow_id\":\"5c9b855f-828f-423d-8df4-763fa8efc9b7\",\n\t \"to\": {\n\t\t\"mobile\" : \"".$mobileNumber."\",\n\t\t\"email\" : \"harshitha.sunitha@kaleyra.com\"\n\t}\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "api-key: Af34dc1802c25989b750ca71f58f59755",
    ": "
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$json = [];


$responseData = json_decode( $response, true  );

if( !empty($responseData['error']) ){
  $json ['success'] = false;
  $json ['message'] = $responseData['message'];
} else {
  $json ['success'] = true;
  $json ['verify_id'] = $responseData['data']['verify_id'];
  $_SESSION['verify_id'] = $responseData['data']['verify_id'];
}
}
//encode JSON
  echo json_encode($json);


// echo json_encode( $responseJson ); die;




