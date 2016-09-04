<?php

function verifyNumber($phone_number){
// get API Access Key
require 'Config.php';

// Initialize CURL:
$ch = curl_init('http://apilayer.net/api/validate?access_key='.$numverify_access_key.'&number='.$phone_number.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$validationResult = json_decode($json, true);

// Access and use your preferred validation result objects
return $validationResult;

}
?>
