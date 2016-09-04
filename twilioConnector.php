<?php
function sendMessage($number,$name){
require('twilio-php/Services/Twilio.php');

$account_sid = 'AC6a238391dcee4e865af1449fa5deff29';
$auth_token = '6048fa8ba94e1bdcd2e65467e05d3fcb';

$client = new Services_Twilio($account_sid, $auth_token);
$message = $client->account->messages->sendMessage(
  '+12016465241', // From a valid Twilio number
  $number, // Text this number
  "Hello $name, monkey!"
);

print $message->sid;

  }
 ?>
