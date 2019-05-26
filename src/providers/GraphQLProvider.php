<?php

namespace AnthraxisBR\SwooleFW\providers;


use AnthraxisBR\SwooleFW\database\Entitites;
use AnthraxisBR\SwooleFW\providers\BaseProvider;
use AnthraxisBR\SwooleFW\traits\Injection;

class GraphQLProvider extends BaseProvider
{

    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\SwooleFW\graphql\GraphQL';
        $this->name = 'graphql';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}