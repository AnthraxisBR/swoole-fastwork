<?php


namespace AnthraxisBR\SwooleFW\routing;


use AnthraxisBR\SwooleFW\builder\Builder;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\http\Response;

class Wrapper
{

    public $request;

    public $response;

    public $route;

    public $server;

    /**
     * Wrapper constructor.
     * @param $server
     * @param Request $request
     * @param Response $response
     */
    public function __construct($server, Request $request, Response $response)
    {
        $this->server = $server;

        $this->request = $request;

        $this->response = $response;

    }

    public function getPostBody() : array
    {
        return json_decode($this->getRequest()->rawContent());
    }

    public function getHeaders() : string
    {
        return $this->getRequest()->headers;
    }

    public function getRequestMethod() : string
    {
        return $this->getRequest()->server['request_method'];
    }

    public function getRequestServerProtocol() : string
    {
        return $this->getRequest()->server['server_protocol'];
    }


    public function getRequestRemoteAddr() : string
    {
        return $this->getRequest()->server['remote_addr'];
    }


    public function getRequestUri() : string
    {
        return $this->getRequest()->server['request_uri'];
    }


    public function getRequest() : \Swoole\Http\Request
    {
        return $this->request->swoole_request;
    }


    public function process() : Response
    {
        $this->route = Builder::route($this);
        $this->response->setBody($this->route->getResponse());
        $this->response->swoole_response->header('Content-Type', 'application/json');
        return $this->response;
    }
}