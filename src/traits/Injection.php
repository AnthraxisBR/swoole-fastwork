<?php


namespace AnthraxisBR\FastWork\traits;


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