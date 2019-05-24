<?php

namespace GabrielMourao\SwooleFW\actions;

use GabrielMourao\SwooleFW\database\Entitites;

class  Actions
{

    public $response;

    public $conn;

    public $providers = [];

    public function __construct()
    {

    }


    public function appendProvider($provider)
    {
        if(!is_null($provider)){
            $this->providers[$provider->name] = $provider;
        }
    }

}