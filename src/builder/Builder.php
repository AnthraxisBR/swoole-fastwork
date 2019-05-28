<?php


namespace AnthraxisBR\SwooleFW\builder;


use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\http\Response;
use AnthraxisBR\SwooleFW\routing\Router;
use AnthraxisBR\SwooleFW\routing\Wrapper;

class Builder
{

    /**
     * Return a builded route
     * @param $object
     * @return Router
     */
    public static function route($object) : Router
    {
        return new Router($object);
    }

    /**
     * Build and routes wrapper
     * @param $server
     * @param Request $request
     * @param Response $response
     * @return Wrapper
     */
    public static function wrapper($server, Request $request, Response $response) : Wrapper
    {
        return new Wrapper($server, $request, $response);
    }
}