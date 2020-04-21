<?php
/******************************************************
 
JotForm to MySQL Database Through Webhook - Sample Script
Elton Cris - JotForm Tech Support
www.jotform.com
 
Test form: https://form.jotform.com/62893435003959
Check request here: https://jotthemes.000webhostapp.com/jotform/view.php
 
******************************************************/
 
//Replace with your DB Details
$servername = "localhost";
$username = "root";
$password = "V3rP3suGQGDh5qe2";
$dbname = "laitkor_chatbot";
 
//Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
//Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


/*$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

   $text = $json->results->metadata->intentName;

    switch ($text) {
        case 'Graphical1':
            $speech = "This question is too personal";
            break;    
        default:
            $speech = "Sorry, I didnt get that.";
            break;
    }

    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}*/







$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
$data = array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "Hello from webhook"
        );
        echo json_encode($data);/*
if (isset($update["result"]["action"])) {
        $data = array(
            "source" => $update["result"]["source"],
            "speech" => "Hello from webhook",
            "displayText" => "Hello from webhook",
            "contextOut" => array()
        );
        echo json_encode($data);
}*/

$mysqli->close();

?>
