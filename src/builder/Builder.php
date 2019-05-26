<?php


namespace AnthraxisBR\SwooleFW\builder;


use AnthraxisBR\SwooleFW\routing\Router;
use AnthraxisBR\SwooleFW\routing\Wrapper;

class Builder
{

    public static function route($object) : Router
    {
        return new Router($object);
    }

    public static function wrapper($server, $request, $response)
    {
        return new Wrapper($server, $request, $response);
    }
}