<?php
/**
 * Created by PhpStorm.
 * User: benson
 * Date: 5/4/2018
 * Time: 12:23 PM
 */
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
// Specify your authentication credentials
$username   = "zalego1";
$apikey     = "12bcdaa4d3f7647023c16d66e88d4031c891ecaeb83ba5e0e61b6def9faa777b";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = "+254791293675,+254706196611,+254718712703";
// And of course we want our recipients to know what we really do
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
/*************************************************************************************
NOTE: If connecting to the sandbox:
1. Use "sandbox" as the username
2. Use the apiKey generated from your sandbox application
https://account.africastalking.com/apps/sandbox/settings/key
3. Add the "sandbox" flag to the constructor
$gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
 **************************************************************************************/
// Any gateway error will be captured by our custom Exception class below,
// so wrap the call in a try-catch block
try
{
    // Thats it, hit send and we'll take care of the rest.
    $results = $gateway->sendMessage($recipients, $message);

    foreach($results as $result) {
        // status is either "Success" or "error message"
        echo " Number: " .$result->number;
        echo " Status: " .$result->status;
        echo " MessageId: " .$result->messageId;
        echo " Cost: "   .$result->cost."\n";
    }
}
catch ( AfricasTalkingGatewayException $e )
{
    echo "Encountered an error while sending: ".$e->getMessage();
}
