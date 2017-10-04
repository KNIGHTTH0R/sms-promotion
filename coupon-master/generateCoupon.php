<?php

//Gets the phone number from the user's form
$phone_num = $_GET["num"];

//Variables
$time = date("H"); //gets the time of the server
$time_message = "";

 //echo '<script>console.log(\"$time\")</script>';

//Checks time of the server
if ($time < 12){
	$time_message = "Good morning! Your promocode is AM123";
}
elseif ($time >= 12){
	$time_message = "Hello! Your promocode is PM456";
}

// Sending an SMS using the Twilio API
// Get the PHP helper library from twilio.com/docs/php/install
require __DIR__ . '/twilio-php-master/Twilio/autoload.php'; // Loads the library
use Twilio\Rest\Client;
// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC2fadd289afb99f621a4d15079ba5e439";
$token = "ea21e4e0984975633e5ebdb13e88bc6e";
$client = new Client($sid, $token);
$client->messages->create(
  "+357".$phone_num,
  array(
    // A Twilio phone number you purchased at twilio.com/console
        'from' => '+447492886399',
        // the body of the text message you'd like to send
        'body' => "$time_message"
  )
);

?>