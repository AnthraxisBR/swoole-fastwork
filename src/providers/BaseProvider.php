<?php


namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\graphql\GraphQL;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Routing\Router;
use AnthraxisBR\FastWork\tasks\TasksManager;
use mysql_xdevapi\Exception;

class BaseProvider
{


    public function getInstance(Router $router, $swoole_request = null, $entity = null, $fixed = false)
    {
        $class = null;

        foreach ($router->parameters as $item){

            if(!is_null($item->getClass())) {
                $name = $item->getClass()->name;
                $reflector = new \ReflectionClass($name);
                if ($reflector->isSubclassOf($this->object_reference) || is_a($name, $this->object_reference, true)) {
                    $class = $item->getClass()->name;
                    break;
                }
            }
        }

        if($fixed === true) {
            $class = $this->object_reference;
            $inst = new $class($router,$this->routes);
            $inst->name = $this->name;
            return $inst;
        }
        try {
            if (!is_null($class)) {
                if (is_a($class, Request::class, true)) {
                    $inst = new $class($router->request);
                } else {
                    if (is_a($class, GraphQL::class, true)) {
                        $inst = new $class($entity, $swoole_request->rawContent());
                    } else {
                        if (is_a($class, Entities::class, true)) {
                            $inst = new $class();
                        } elseif (is_a($class, TasksManager::class, true)) {
                            $inst = new $class($router);
                        } else {
                            $inst = new $class($router);
                        }
                    }
                }

                $inst->name = $this->name;
                return $inst;
            } else {
                return null;
            }
        }catch (\Exception $E){

            var_dump($E->getMessage());
        }
    }
}