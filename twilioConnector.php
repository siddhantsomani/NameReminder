<?php
// function sendMessage()
// {
//   require 'Config.php';
//
//   echo "inside";
//   $client = new Twilio\Rest\Client($sid, $token);
//   var_dump($client);
//   $message = $client->messages->create(
//   '8608599189', // Text this number
//   array(
//   'from' => '+12016465241',
//   'body' => 'Testing Successful'
//   )
//   );
//
//   print $message->sid;
// }
 ?>

 <?php
 // Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;
     // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
     require 'Config.php';
     // Step 3: instantiate a new Twilio Rest Client
     $client = new Client($AccountSid, $AuthToken);

     // Step 4: make an array of people we know, to send them a message.
     // Feel free to change/add your own phone number and name here.
     $people = array(
         "+919092670035" => "Hemant"
     );

     // Step 5: Loop over all our friends. $number is a phone number above, and
     // $name is the name next to it
     foreach ($people as $number => $name) {

         $sms = $client->account->messages->create(

             // the number we are sending to - Any phone number
             $number,

             array(
                 // Step 6: Change the 'From' number below to be a valid Twilio number
                 // that you've purchased
                 'from' => "+12016465241",

                 // the sms body
                 'body' => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
             )
         );

         // Display a confirmation message on the screen
         echo "Sent message to $name";
     }
