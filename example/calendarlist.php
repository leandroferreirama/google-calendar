<?php

require __DIR__ . "/../vendor/autoload.php";

use LeandroFerreiraMa\GoogleCalendar\Calendar;

$token = 'ya29.**';

$calendar = new Calendar(
    $token
);

echo "<h1>Insert Calendar</h1>";

$calendarInsert = $calendar->insert('teste de cadastro');
var_dump($calendarInsert);


/**
 * READ
 */
echo "<h1>READ - List Calendars</h1>";

$calendars = $calendar->read(null);
var_dump($calendars->response());


echo "<h1>TIMEZONE</h1>";

$timezone = $calendar->timezone(null);
var_dump($timezone);

