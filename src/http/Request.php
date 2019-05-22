<?php

namespace GabrielMourao\SwooleFW\http;
use \GuzzleHttp\Psr7\Request as RequestBase;

class Request extends RequestBase
{
    public function __construct(
        $method,
        $uri,
        array $headers = [],
        $body = null,
        $version = '1.1'
    )
    {
        $this->data = json_decode($body);
        parent::__construct($method, $uri, $headers, $body, $version);
    }

    public function getData()
    {
        return $this->data;
    }
}