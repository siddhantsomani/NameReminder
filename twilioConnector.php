<?php
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
function sendMessage(){
// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
     // Set AccountSid and AuthToken
     require 'Config.php';
     // Instantiate a new Twilio Rest Client
     $client = new Client($AccountSid, $AuthToken);

     $people = array(
         "+919092670035" => "Hemant"
     );

     foreach ($people as $number => $name) {

         $sms = $client->account->messages->create(

             $number,

             array(
                 'from' => "+12016465241",

                 'body' => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
             )
         );

         // Display a confirmation message on the screen
         echo "Sent message to $name";
     }
}
?>
