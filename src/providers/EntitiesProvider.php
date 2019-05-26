<?php

namespace AnthraxisBR\SwooleFW\providers;


use AnthraxisBR\SwooleFW\database\Entities;
use AnthraxisBR\SwooleFW\providers\BaseProvider;

class EntitiesProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\SwooleFW\database\Entities';
        $this->name = 'entity';
    }

    public function getReference()
    {
        return $this->object_reference;
    }

}