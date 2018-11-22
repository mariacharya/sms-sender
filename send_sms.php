<?php
require_once "vendor/autoload.php";

try {
    //receiving form data (to_number , from_number, message )
    $TO_NUMBER = $_POST["to_number"];
    $FROM_NUMBER = $_POST["from_number"];
    $SMS = $_POST["message"];

    //setting api key and secret
    $API_KEY = "your_api";
    $API_SECRET = "your_key";
    $client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic($API_KEY, $API_SECRET));

    //sending sms
    $message = $client->message()->send([
        'to' => $TO_NUMBER,
        'from' => $FROM_NUMBER,
        'text' => $SMS,
    ]);

    $client->message()->send($message);

    echo "Sent message to " . $message['to'] . ". Balance is now " . $message['remaining-balance'] . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
