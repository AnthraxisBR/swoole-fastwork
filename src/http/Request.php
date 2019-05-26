<?php

namespace AnthraxisBR\SwooleFW\http;
use AnthraxisBR\SwooleFW\traits\Injection;
use GuzzleHttp\Psr7\Request as RequestBase;
use Swoole\Http\Request as SwooleRequest;

class Request extends RequestBase
{

    use Injection;

    public static $injection_reference = 'request';

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

        if($request->server['request_method'] == 'POST'){
            $this->setData($request->rawContent());
        }

        parent::__construct(
            $request->server['request_method'],
            $request->server['request_uri'],
            $request->header,
            $request->post,
            explode('/', $request->server['server_protocol'][1])
        );
    }

    public function getServerJson()
    {
        return $this->swoole_request->server;
    }

    public function setData($data)
    {
        $this->data = json_decode($data);
    }

    public function getJsonData()
    {
        return json_encode($this->data);
    }

    public function getData()
    {
        return $this->data;
    }
}