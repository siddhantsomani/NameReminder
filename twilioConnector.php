<?php
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
function sendMessage($number,$name){

use Twilio\Rest\Client;
     // Set AccountSid and AuthToken
     require 'Config.php';
     // Instantiate a new Twilio Rest Client
     $client = new Client($AccountSid, $AuthToken);

     $people = array(
         $number => $name
     );

     foreach ($people as $number => $name) {

         $sms = $client->account->messages->create(

             $number,

             array(
                 'from' => "+12016465241",

                 'body' => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
             )
         );

         // Confirmation message
         echo "Sent message to $name";
     }
}
?>
