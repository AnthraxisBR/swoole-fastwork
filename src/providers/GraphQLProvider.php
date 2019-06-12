<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entitites;
use AnthraxisBR\FastWork\providers\BaseProvider;
use AnthraxisBR\FastWork\traits\Injection;

class GraphQLProvider extends BaseProvider
{

    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\FastWork\graphql\GraphQL';
        $this->name = 'graphql';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}