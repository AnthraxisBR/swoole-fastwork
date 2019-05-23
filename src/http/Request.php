<?php

namespace GabrielMourao\SwooleFW\http;
use GuzzleHttp\Psr7\Request as RequestBase;
use Swoole\Http\Request as SwooleRequest;

class Request extends RequestBase
{
    public function __construct(
        SwooleRequest $request,
        $method = '',
        $uri = '',
        array $headers = [],
        $body = null,
        $version = '1.1'
    )
    {
        $this->swoole_request = $request;

        parent::__construct(
            $request->server['request_method'],
            $request->server['request_uri'],
            $request->header,
            $request->post,
            explode('/', $request->server['server_protocol'][1])
        );
    }


    public function getData()
    {
        return $this->data;
    }
}