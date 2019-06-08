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

    public $server;

    public function __construct()
    {

    }
    public function taskWaitMulti($data)
    {
        return $this->getServer()->taskWaitMulti($data);
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

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @param mixed $conn
     */
    public function setConn($conn): void
    {
        $this->conn = $conn;
    }

    /**
     * @return array
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * @param array $providers
     */
    public function setProviders(array $providers): void
    {
        $this->providers = $providers;
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server): void
    {
        $this->server = $server;
    }




}