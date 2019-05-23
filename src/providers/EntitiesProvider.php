<?php

namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entitites;

class EntitiesProvider
{
    public $object_reference;

    public function __construct()
    {
        $this->object_reference = 'GabrielMourao\SwooleFW\database\Entities';
    }

    public function getReference()
    {
        return $this->object_reference;
    }

}