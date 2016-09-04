<?php
  function checkTime($countrycode){
    require 'connect.php';
    $q1 = "Select * from zone where country_code='$countrycode'";
    $result = mysqli_query($conn,$q1);
    $arr = mysqli_fetch_assoc($result);
    $zoneid = $arr['zone_id'];
    $q1 = "Select * from timezone where zone_id='$zoneid'";
    $result = mysqli_query($conn,$q1);
    $arr = mysqli_fetch_assoc($result);
    $ans = $arr['gmt_offset'];
    $nightStart = strtotime(date("H:i:s", mktime(22, 0, 0)));
    $nightEnd = strtotime(date("H:i:s", mktime(6, 0, 0)));
    $currentTime = strtotime(date('H:i:s', strtotime("now"))) + $ans;
    mysqli_close($conn);
    if($currentTime<=$nightStart && $currentTime>=$nightEnd)
    {
      return true;
    }
    else {
      return false;
    }
  }

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
