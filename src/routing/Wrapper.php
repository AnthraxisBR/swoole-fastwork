<?php


namespace GabrielMourao\SwooleFW\routing;


use GabrielMourao\SwooleFW\builder\Builder;
use GabrielMourao\SwooleFW\http\Response;

class Wrapper
{

    public $request;

    public $response;

    public $route;

    public function __construct($request, Response $response)
    {

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