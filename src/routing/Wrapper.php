<?php


namespace AnthraxisBR\SwooleFW\routing;


use AnthraxisBR\SwooleFW\builder\Builder;
use AnthraxisBR\SwooleFW\http\Response;

class Wrapper
{

    public $request;

    public $response;

    public $route;

    public $server;

    public function __construct($server, $request, Response $response)
    {
        $this->server = $server;

        $this->request = $request;

        $this->response = $response;

    }

    public function getPostBody()
    {
        return json_decode($this->getRequest()->rawContent());
    }

    public function getHeaders()
    {
        return $this->getRequest()->headers;
    }

    public function getRequestMethod()
    {
        return $this->getRequest()->server['request_method'];
    }

    public function getRequestServerProtocol()
    {
        return $this->getRequest()->server['server_protocol'];
    }


    public function getRequestRemoteAddr()
    {
        return $this->getRequest()->server['remote_addr'];
    }


    public function getRequestUri()
    {
        return $this->getRequest()->server['request_uri'];
    }


    public function getRequest()
    {
        return $this->request->swoole_request;
    }


    public function process()
    {
        $this->route = Builder::route($this);
        $this->response->setBody($this->route->getResponse());
        $this->response->swoole_response->header('Content-Type', 'application/json');
        return $this->response;
    }
}