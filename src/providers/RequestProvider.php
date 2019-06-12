<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entitites;
use AnthraxisBR\FastWork\providers\BaseProvider;

class RequestProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\FastWork\http\Request';
        $this->name = 'request';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}