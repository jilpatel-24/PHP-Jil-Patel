<?php
// Allow CORS (for testing in browser or Postman)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


$headers = getallheaders(); // get all request headers


if (isset($headers['X-Auth-Token']))  // check if custom header exists (e.g., X-Auth-Token)
{
    $token = $headers['X-Auth-Token'];

    
    echo json_encode  // send response
	([
        "message" => "Header received successfully",
        "header_value" => $token
    ]);
} 
else {
    
    http_response_code(400); // missing header
    echo json_encode
	([
        "error" => "Missing required header: X-Auth-Token"
    ]);
}
?>
<!--
Add in postman GET http://localhost/php/API_Assignment/create_api_with_header/header.php

Key: X-Auth-Token
Value: mysecrettoken123

Also add Header in Postman
{
    "Key": "X-Auth-Token",
    "Value": "mysecrettoken123"
}
-->
