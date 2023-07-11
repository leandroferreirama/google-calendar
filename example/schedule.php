<?php

require __DIR__ . "/../vendor/autoload.php";

use LeandroFerreiraMa\GoogleCalendar\Schedule;

/**
 * READ
 */
echo "<h1>SIMPLE READ</h1>";

$token = 'ya29.******';

$schedule = new Schedule(
    $token
);
$read = $schedule->read(null, null);
var_dump($read->response());
#Captura token de atualização
$nextSyncToken = $read->response()->nextSyncToken;

echo "<h1>READ UPDATED EVENTS</h1>";
$updated = $schedule->read(null, $nextSyncToken);
var_dump($updated->response());

/**
 * CREATE
 */
echo "<h1>CREATE</h1>";

$token = 'ya29.******';

$schedule = new Schedule(
    $token
);

$create = $schedule->create(
    "Title test", 
    (new DateTime('2023-07-11 03:45:00')), 
    (new DateTime('2023-07-11 04:45:00')),
    "Description test",
    "location test",
    "primary",
    [
        "email" => "guest1@email.com",
        "email" => "guest2@email.com"
    ]
);

var_dump($create->response());

/**
 * UPDATE
 */
echo "<h1>UPDATE</h1>";

$token = 'ya29.******';

$schedule = new Schedule(
    $token
);

$update = $schedule->update(
    "eventId****",
    "Title test", 
    (new DateTime('2023-07-11 03:45:00')), 
    (new DateTime('2023-07-11 04:45:00')),
    "Description test",
    "location test",
    "primary",
    "cancelled",
    [
        "email" => "guest1@email.com",
        "email" => "guest2@email.com"
    ]
);

var_dump($update->response());
