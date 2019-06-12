<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\providers\BaseProvider;

class AuthProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\FastWork\auth\Authentication';
        $this->name = 'auth';
    }

    public function getReference()
    {
        return $this->object_reference;
    }

}