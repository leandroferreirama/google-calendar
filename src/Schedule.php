<?php

namespace LeandroFerreiraMa\GoogleCalendar;

use DateInterval;
use DateTime;

class Schedule extends GoogleCalendar
{
    public function __construct(string $token)
    {
        parent::__construct($token);
    }

    public function read(?array $headers, ?string $syncToken, ?DateTime $startDate = null, ?string $calendaId = 'primary'): Schedule
    {
        $url_parameters = array();

        if(!empty($syncToken)){
            $url_parameters['syncToken'] = strip_tags($syncToken);
        } else {
            if(is_null($startDate)){
                $startDate = new DateTime('now');
                $interval = new DateInterval("P1D");
                $startDate->sub($interval);
            }
            $url_parameters['timeMin'] = $startDate->format(DATE_W3C);
        }
        
        $this->request(
            "GET",
            "v3/calendars/{$calendaId}/events?". http_build_query($url_parameters),
            null,
            $headers
        );
        return $this;
    }

    public function create(string $summary, DateTime $start, DateTime $end,?string $description = null, ?string $location = null, ?string $calendaId = 'primary', ?array $attendees = []): Schedule
    {
        $schedule = [
            "summary" => $summary,
            "description" => $description,
            "location" => $location,
            "start" => array('dateTime' => $start->format(DATE_RFC3339)),
            "end" => array('dateTime' => $end->format(DATE_RFC3339)),
            "attendees" => $attendees
        ];
        
        $this->request(
            "POST",
            "v3/calendars/{$calendaId}/events",
            $schedule,
            ["Content-Type" => "application/json"]
        );
        return $this;
    }

    public function update(string $eventId, string $summary, DateTime $start, DateTime $end,?string $description = null, ?string $location = null, ?string $calendaId = 'primary', string $status = 'confirmed', ?array $attendees = []): Schedule
    {
        $schedule = [
            "summary" => $summary,
            "description" => $description,
            "location" => $location,
            "status" => $status,
            "start" => array('dateTime' => $start->format(DATE_RFC3339)),
            "end" => array('dateTime' => $end->format(DATE_RFC3339)),
            "attendees" => $attendees
        ];
        
        $this->request(
            "PUT",
            "v3/calendars/{$calendaId}/events/{$eventId}",
            $schedule,
            ["Content-Type" => "application/json"]
        );
        return $this;
    }

    public function delete(string $eventId, ?string $calendaId = 'primary'): Schedule
    {   
        $this->request(
            "DELETE",
            "v3/calendars/{$calendaId}/events/{$eventId}",
            null,
            ["Content-Type" => "application/json"]
        );
        return $this;
    }
}
