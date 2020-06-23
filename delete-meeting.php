<?php
require_once 'config.php';
 
$client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
 
$db = new DB();
$arr_token = $db->get_access_token();
$accessToken = $arr_token->access_token;
$meetingId = $_GET['meetingid'];  

$response = $client->request('DELETE', "/v2/meetings/{$meetingId}", [
    "headers" => [
        "Authorization" => "Bearer $accessToken"
    ]
]);