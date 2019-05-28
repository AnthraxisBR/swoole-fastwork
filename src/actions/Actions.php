<?php

namespace AnthraxisBR\SwooleFW\actions;

use AnthraxisBR\SwooleFW\database\Entitites;
use AnthraxisBR\SwooleFW\providers\BaseProvider;

class  Actions
{

    public $response;

    public $conn;

    public $providers = [];

    public function __construct()
    {

    }

    /**
     * Receive some provided class
     * @param $provider
     */
    public function appendProvided($provider) : void
    {
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * Receive mandatory provided class
     * @param $provider
     */
    public function appendFixedProvided($provider)
    {
        $this->providers['fixed'] = [];
        if(!is_null($provider)){
            $this->providers['fixed'][$provider->name] = $provider;
            $this->providers['fixed'][$provider->name]->routes = $provider->routes;
        }
    }

}