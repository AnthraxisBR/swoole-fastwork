<?php

namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entitites;
use GabrielMourao\SwooleFW\providers\BaseProvider;
use GabrielMourao\SwooleFW\traits\Injection;

class GraphQLProvider extends BaseProvider
{

    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'GabrielMourao\SwooleFW\graphql\GraphQL';
        $this->name = 'graphql';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}