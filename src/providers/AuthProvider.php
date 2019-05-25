<?php

namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entities;
use GabrielMourao\SwooleFW\providers\BaseProvider;

class EntitiesProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'GabrielMourao\SwooleFW\database\Entities';
        $this->name = 'entity';
    }

    public function getReference()
    {
        return $this->object_reference;
    }

}