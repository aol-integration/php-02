<?php

$clientId = '...';
$clientSecret = '...';
$refreshToken = '...';

$parameter = [];
$parameter['grant_type'] = 'refresh_token';
$parameter['refresh_token'] = $refreshToken;

$auth = base64_encode($clientId . ':' . $clientSecret);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Authorization: Basic ' . $auth . "\r\n",
        'content' => http_build_query($parameter),
        'ignore_errors' => true,
    )
);

$context  = stream_context_create($opts);
$result = file_get_contents('https://account.accurate.id/oauth/token', false, $context);

echo $result;

?>