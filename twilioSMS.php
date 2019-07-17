// Send an SMS using Twilio's REST API and PHP
<?php
$sid = ""; // Your Account SID from www.twilio.com/console
$token = ""; // Your Auth Token from www.twilio.com/console
require_once 'Twilio/autoload.php';

$client = new Twilio\Rest\Client($sid, $token);
$message = $client->messages->create(
  '+91807481949563', // Text this number
  array(
    'from' => '+19167247137810', // From a valid Twilio number
    'body' => 'Hello from Twilio!'
  )
);

print $message->sid;