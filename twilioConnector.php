<?php
function sendMessage()
{

  require 'Config.php';
  $client = new Twilio\Rest\Client($sid, $token);
  $message = $client->messages->create(
  '+918608599189', // Text this number
  array(
  'from' => '+12016465241',
  'body' => 'Testing Successful'
  )
  );

  print $message->sid;
}
 ?>
