<?php

namespace LeandroFerreiraMa\GoogleCalendar;

abstract class GoogleCalendar
{
    private string $apiUrl;
    private ?array $headers;
    private ?array $fields;
    private string $endpoint;
    private string $method;
    protected ?object $response;

    public function __construct(string $token)
    {
        $this->apiUrl = 'https://www.googleapis.com/calendar';
        $this->headers(['Authorization' => 'Bearer '. $token]);
    }

    protected function request(string $method, string $endpoint, ?array $fields = null, ?array $headers = null): void
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->fields = $fields;
        $this->headers($headers);

        $this->dispatch();
    }

    public function response(): ?object
    {
        return $this->response;
    }

    public function error(): ?object
    {
        if (!empty($this->response->errors)) {
            return $this->response->errors;
        }

        return null;
    }

    private function headers(?array $headers): void
    {
        if (!$headers) {
            return;
        }

        foreach ($headers as $key => $header) {
            $this->headers[] = "{$key}: {$header}";
        }
    }


    private function dispatch(): void
    {
        $curl = curl_init();
        $fields = (!empty($this->fields) ? json_encode($this->fields) : null);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->apiUrl}/{$this->endpoint}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => $this->headers,
        ));

        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }
}
