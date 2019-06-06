<?php


namespace AnthraxisBR\SwooleFW\Routing;

use AnthraxisBR\SwooleFW\builder\Builder;
use AnthraxisBR\SwooleFW\Exceptions\MethodNotAllowed;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\http\Response;

class Wrapper
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var Response
     */
    public $response;

    /**
     * @var string
     */
    public $route;

    /**
     * @var
     */
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
     * @return \Swoole\Http\Request
     */
    public function getRequest() : Request
    {
        return  $this->request;
    }

    /**
     * @return Response
     */
    public function process() : Response
    {
        try {
            $this->route = Builder::route($this);
            $this->response->setBody($this->route->getResponse());

        }catch (\Exception $e){
            $this->response->setBody($e->getMessage());
        }
        $this->response->swoole_response->header('Content-Type', 'application/json');
        return $this->response;

    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }


}