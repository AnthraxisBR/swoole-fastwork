<?php

namespace AnthraxisBR\SwooleFW\providers;


use AnthraxisBR\SwooleFW\database\Entitites;
use AnthraxisBR\SwooleFW\providers\BaseProvider;

class RequestProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\SwooleFW\http\Request';
        $this->name = 'request';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}