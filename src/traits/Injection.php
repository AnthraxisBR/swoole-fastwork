<?php


namespace AnthraxisBR\SwooleFW\traits;


trait Injection
{

    public static function getInjectReference()
    {
        return self::$injection_reference;
    }

    public function getName()
    {
        return $this->name;
    }
}