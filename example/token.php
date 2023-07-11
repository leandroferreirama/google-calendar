<?php

use LeandroFerreiraMa\GoogleCalendar\Token;

require __DIR__ . "/../vendor/autoload.php";


$token = new Token(
    "ya29.***"
);


/**
 * TOKEN INFO
 */
echo "<h1>TOKEN</h1>";

$tokenInfo = $token->read(null);
var_dump($tokenInfo->response());

echo '<hr>';
/**
 * USER INFO
 */
echo "<h1>USER INFO</h1>";
$userInfo = $token->user(null);
var_dump($userInfo->response());
