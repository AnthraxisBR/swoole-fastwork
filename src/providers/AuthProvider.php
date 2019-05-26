<?php

namespace AnthraxisBR\SwooleFW\providers;


use AnthraxisBR\SwooleFW\database\Entities;
use AnthraxisBR\SwooleFW\providers\BaseProvider;

class AuthProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\SwooleFW\auth\Authentication';
        $this->name = 'auth';
    }

    public function getReference()
    {
        return $this->object_reference;
    }

}