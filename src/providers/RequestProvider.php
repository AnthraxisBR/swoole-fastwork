<?php

namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entitites;
use GabrielMourao\SwooleFW\providers\BaseProvider;

class RequestProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'GabrielMourao\SwooleFW\http\Request';
        $this->name = 'request';
    }

    public function getReference()
    {
        return $this->object_reference;
    }
}