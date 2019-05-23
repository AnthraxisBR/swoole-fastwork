<?php

namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entitites;

class GraphQLProvider
{
    public $object_reference;

    public function __construct()
    {
        $this->object_reference = 'GabrielMourao\SwooleFW\graphql\GraphQL';

    }

    public function getReference()
    {
        return $this->object_reference;
    }

    public function getInstance($entity, $query)
    {
        return new $this->object_reference($entity, $query);
    }
}