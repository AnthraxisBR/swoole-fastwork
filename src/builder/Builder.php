<?php


namespace AnthraxisBR\FastWork\builder;


use AnthraxisBR\FastWork\http\Request;
use AnthraxisBR\FastWork\http\Response;
use AnthraxisBR\FastWork\Routing\Router;
use AnthraxisBR\FastWork\Routing\Wrapper;

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
    public static function wrapper($server, $request, Response $response) : Wrapper
    {
        return new Wrapper($server, $request, $response);
    }
}