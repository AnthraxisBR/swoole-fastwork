<?php


namespace GabrielMourao\SwooleFW\builder;


use GabrielMourao\SwooleFW\routing\Router;

class Builder
{

    public static function route($object) : Router
    {
        return new Router($object);
    }


}