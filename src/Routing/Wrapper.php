<?php


namespace AnthraxisBR\SwooleFW\Routing;


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

    /**
     * @return object
     */
    public function getPostBody() : object
    {
        return (object) json_decode($this->getRequest()->rawContent());
    }

    /**
     * @return array
     */
    public function getHeaders() : array
    {
        return (array) $this->getRequest()->headers;
    }

    /**
     * @return string
     */
    public function getRequestMethod() : string
    {
        return (string) $this->getRequest()->server['request_method'];
    }

    /**
     * @return string
     */
    public function getRequestServerProtocol() : string
    {
        return (string) $this->getRequest()->server['server_protocol'];
    }

    /**
     * @return string
     */
    public function getRequestRemoteAddr() : string
    {
        return (string) $this->getRequest()->server['remote_addr'];
    }


    /**
     * @return string
     */
    public function getRequestUri() : string
    {
        return (string) $this->getRequest()->server['request_uri'];
    }

    /**
     * @return \Swoole\Http\Request
     */
    public function getRequest() : \Swoole\Http\Request
    {
        return  $this->request->swoole_request;
    }

    /**
     * @return Response
     */
    public function process() : Response
    {
        $this->route = Builder::route($this);
        $this->response->setBody($this->route->getResponse());
        $this->response->swoole_response->header('Content-Type', 'application/json');
        return $this->response;
    }
}