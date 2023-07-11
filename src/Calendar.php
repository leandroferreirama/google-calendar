<?php

namespace LeandroFerreiraMa\GoogleCalendar;

class Calendar extends GoogleCalendar
{
    public function __construct(string $token)
    {
        parent::__construct($token);
    }

    public function read(?array $headers): Calendar
    {
        $url_parameters = array();

		$url_parameters['fields'] = 'items(id,summary,timeZone)';
		$url_parameters['minAccessRole'] = 'owner';

        $this->request(
            "GET",
            "v3/users/me/calendarList?". http_build_query($url_parameters),
            null,
            $headers
        );
        return $this;
    }

    public function timezone(?array $headers): ?string
    {
        $this->request(
            "GET",
            "v3/users/me/settings/timezone",
            null,
            $headers
        );
        return $this->response()->value;
    }
}