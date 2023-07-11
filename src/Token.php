<?php

namespace LeandroFerreiraMa\GoogleCalendar;

class Token extends GoogleCalendar
{
    public function __construct(string $token)
    {
        parent::__construct($token);
    }

    public function read(?array $headers): Token
    {
        $this->request(
            "GET",
            "v3/tokeninfo",
            null,
            $headers
        );
        return $this;
    }

    public function user(?array $headers): Token
    {
        $this->request(
            "GET",
            "v3/userinfo",
            null,
            $headers
        );
        return $this;
    }
}