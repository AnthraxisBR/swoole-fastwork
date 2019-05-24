<?php


namespace GabrielMourao\SwooleFW\traits;


trait Injection
{

    public static function getInjectReference()
    {
        return self::$injection_reference;
    }
}