<?php


namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\graphql\GraphQL;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Routing\Router;
use AnthraxisBR\FastWork\tasks\TasksManager;

class BaseProvider extends AbstractProviderBase
{

    public $object_reference = null;

    private $name;

    public function getInstance(Router $router, $swoole_request = null, $entity = null, $fixed = false)
    {

        $class = null;

        /**
         * Check if a parameter of a function from Action class is a subclass of a 'object_referece',
         *   a object_reference is a service provider
         */
        foreach ($router->parameters as $item){

            if(!is_null($item->getClass())) {
                $name = $item->getClass()->name;
                try {
                    $reflector = new \ReflectionClass($name);
                    if ($reflector->isSubclassOf($this->getObjectReference()) || is_a($name, $this->getObjectReference(), true)) {
                        $class = $item->getClass()->name;
                        break;
                    }
                }catch (\ReflectionException $e){
                    var_dump($e->getMessage());
                }
            }
        }

        if($fixed === true) {
            $class = $this->getObjectReference();
            echo var_dump($class);
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

                $inst->name = $this->getName();
                return $inst;
            } else {
                return null;
            }
        }catch (\Exception $E){

            var_dump($E->getMessage());
        }
    }

    private function mount()
    {

    }

    private function isFixed()
    {

    }

    public function getObjectReference()
    {
        return $this->object_reference;
    }
}