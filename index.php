<?php

$server_key = "SB-Mid-server-HF6Cs7KjFhYp66HpSHUQWauK";

$is_production = false;
$is_production = false;
$api_url = $is_production ?
         'https://app.midtrans.com/snap/v1/transactions' :
         'https://app.sandbox.midtrans.com/snap/v1/transactions'; 

if(!strpos($_SERVER['REQUEST_URI'],'/charge')){
    http_response_code(404);
    echo "wrong path, make sure it`s '/charge'"; exit()
}                 

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(404);
    echo "Page not found or wrong HTTP request method is used"; exit();
}

$request_body = file_get_contents('php://input');
header('Content-type: application/json');

$charge_result = chargeAPI($api_url, $server_key, $request_body);