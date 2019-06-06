<?php

namespace AnthraxisBR\SwooleFW\actions;

use AnthraxisBR\SwooleFW\database\Entitites;
use AnthraxisBR\SwooleFW\providers\BaseProvider;
use AnthraxisBR\SwooleFW\tasks\TasksManager;

class  Actions
{

    public $response;

    public $conn;

    public $providers = [];

    public function __construct()
    {

    }

    public function async(TasksManager $taskManager, $class, $function, $args, $callback)
    {
        return $taskManager->asyncCall($class, $function, $args, $callback);
    }
    /**
     * Receive some provided class
     * @param $provider
     */
    public function appendProvided(object $provider) : void
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