<?php

namespace GabrielMourao\SwooleFW\http;
use GuzzleHttp\Psr7\Response as ResponseBase;
use Swoole\Http\Response as SwooleResponse;

class Response extends ResponseBase
{
    public $body;

    public $swoole_response;

    public function __construct(
        SwooleResponse $response,
        $status = 200,
        array $headers = [],
        $body = null,
        $version = '1.1',
        $reason = null
    )
    {
        $this->swoole_response = $response;
        parent::__construct($status, $headers, $body, $version, $reason);
    }

    public function setStatusCode($statusCode = 200)
    {
        parent::__construct($statusCode, $this->getHeaders(), $this->getBody(), $this->getProtocolVersion(), $this->getReasonPhrase());

    }

    public function setBody($body)
    {
        parent::__construct($this->getStatusCode(), $this->getHeaders(), $body, $this->getProtocolVersion(), $this->getReasonPhrase());

    }

    public function swoole()
    {
        return $this->swoole_response;
    }
}