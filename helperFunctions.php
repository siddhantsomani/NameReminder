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
    $currentTime = strtotime(date('H:i:s', strtotime("now"))) - $ans;
    mysqli_close($conn);
    if($currentTime<=$nightStart && $currentTime>=$nightEnd){
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

function getLogs($number){
  require 'connect.php';
  $q1 = "Select * from users where mobilenumber='$number'";
  $result = mysqli_query($conn,$q1);
  $arr = mysqli_fetch_assoc($result);
  $id = $arr['id'];

  $q1 = "Select * from messagelogs where userid='$id'";
  $result = mysqli_query($conn,$q1);
  $arr = mysqli_fetch_assoc($result);
  $count = $arr['count'];
  mysqli_close($conn);

  return $count;
}

function updateLogs($count,$number)
{
  require 'connect.php';
  $q1 = "Select * from users where mobilenumber='$number'";
  $result = mysqli_query($conn,$q1);
  $arr = mysqli_fetch_assoc($result);
  $id = $arr['id'];
  $currentTime = strtotime(date('H:i:s', strtotime("now")));
  $q1 = "UPDATE messagelogs SET count='$count',lasttime='$currentTime' WHERE id='$id'";
  $result = mysqli_query($conn,$q1);
  mysqli_close($conn);

}

function sendMessage($number,$name){
  require('twilio-php/Services/Twilio.php');

  $account_sid = 'AC6a238391dcee4e865af1449fa5deff29';
  $auth_token = '6048fa8ba94e1bdcd2e65467e05d3fcb';
  $logcount = getLogs($number);
  $client = new Services_Twilio($account_sid, $auth_token);
  if($logcount>0)
  {
    $concat = "Tried $logcount times";
  }
    for($i =0 ; $i<=4;$i++){
      $message = $client->account->messages->sendMessage(
        '+12016465241', //valid Twilio number
        $number,
        "Your Name is $name! Remember remember !".$concat
      );
      if(!isset($message->code))
      {
        $logcount = 0;
        break;
      }
      else
      $logcount++;
    }
    updateLogs($logcount,$number);
    print $message->sid;
    }

 ?>
