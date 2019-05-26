<?php

namespace AnthraxisBR\SwooleFW\actions;

use AnthraxisBR\SwooleFW\database\Entitites;

class  Actions
{

    public $response;

    public $conn;

    public $providers = [];

    public function __construct()
    {

    }

    /**
     * adiciona
     * @param $provider
     */
    public function appendProvider($provider)
    {
        if(!is_null($provider)){
            $this->providers[$provider->name] = $provider;
        }
    }

    public function appendFixedProvider($provider)
    {
        $this->providers['fixed'] = [];
        if(!is_null($provider)){
            $this->providers['fixed'][$provider->name] = $provider;
            $this->providers['fixed'][$provider->name]->routes = $provider->routes;
        }
    }

}