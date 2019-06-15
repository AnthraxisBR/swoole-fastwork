<?php


namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\Database\Entities;
use AnthraxisBR\FastWork\GraphQL\GraphQL;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Reflection\ReflectionClass;
use AnthraxisBR\FastWork\Routing\Router;
use AnthraxisBR\FastWork\Tasks\TasksManager;

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

                    $reflector = new ReflectionClass($name);

                    $reflector->setBase($this);

                    if ($reflector->checkFullObjectReference()) {
                        $class = $item->getClass()->name;
                        break;
                    }
                }catch (\ReflectionException $e){
                    error_log($e->getMessage(), 4);
                    var_dump($e->getMessage());
                }
            }
        }

        if($fixed === true) {
            $class = $this->getObjectReference();
            $inst = new $class($router,$this->routes);
            $inst->name = $this->name;
            return $inst;
        }
        try {
            if (!is_null($class)) {
                if (is_a($class, Request::class, true)) {
                    if(isset($router->getRequest()->swoole_request) and $router->getRequest()->swoole_request !== null){
                        $inst = new $class($router->getRequest()->swoole_request);
                    }else{
                        $inst = new $class($router->request);
                    }
                } else {
                    if (is_a($class, GraphQL::class, true)) {
                        if($swoole_request instanceof \Swoole\Http\Request){
                            $inst = new $class($entity, $swoole_request->rawContent());
                        }else{
                            $inst = new $class($router->application->providers['entity'], $router->request->getContent());
                        }
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