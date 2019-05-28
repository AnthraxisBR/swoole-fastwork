<?php


namespace AnthraxisBR\SwooleFW\providers;


use AnthraxisBR\SwooleFW\database\Entities;
use AnthraxisBR\SwooleFW\graphql\GraphQL;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\routing\Router;
use AnthraxisBR\SwooleFW\tasks\TasksManager;
use mysql_xdevapi\Exception;

class BaseProvider
{


    public function getInstance(Router $router, $swoole_request, $entity = null, $fixed = false)
    {
        $class = null;
        foreach ($router->parameters as $item){
            $name = $item->getClass()->name;
            $reflector = new \ReflectionClass($name);
            if($reflector->isSubclassOf($this->object_reference) || is_a($name ,$this->object_reference,true)){
                $class = $item->getClass()->name;
                break;
            }
        }
        if($fixed === true) {
            $class = $this->object_reference;
            $inst = new $class($router,$this->routes);
            $inst->name = $this->name;
            return $inst;
        }
        if(!is_null($class)) {

            if (is_a($class, Request::class, true)) {
                $inst = new $class($swoole_request);
            } else {
                if (is_a($class, GraphQL::class, true)) {
                    $inst = new $class($entity, $swoole_request->rawContent());
                }else{
                    if (is_a($class, Entities::class, true)) {
                        $inst = new $class();
                    }elseif(is_a($class, TasksManager::class, true)){
                        $inst = new $class($router->wrapper->server);
                    }else{
                        $inst = new $class($router);
                    }
                }
            }

            $inst->name = $this->name;
            return $inst;
        }else{
            return null;
        }
    }
}