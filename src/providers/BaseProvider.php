<?php


namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entities;
use GabrielMourao\SwooleFW\graphql\GraphQL;
use GabrielMourao\SwooleFW\http\Request;
use mysql_xdevapi\Exception;

class BaseProvider
{


    public function getInstance($parameters, $swoole_request, $entity = null)
    {
        $class = null;
        foreach ($parameters as $item){
            $name = $item->getClass()->name;
            $reflector = new \ReflectionClass($name);
            if($reflector->isSubclassOf($this->object_reference) || is_a($name ,$this->object_reference,true)){
                $class = $item->getClass()->name;
                break;
            }
        }
        if(!is_null($class)) {
            if (is_a($class, Request::class, true)) {
                $inst = new $class($swoole_request);
            } else {
                if (is_a($class, GraphQL::class, true)) {
                    var_dump($class . 'asdsadsadasd');
                    $inst = new $class($entity, $swoole_request->rawContent());
                    var_dump(get_class($inst));
                }else{
                    if (is_a($class, Entities::class, true)) {
                        $inst = new $class();
                    }else{
                        throw new Exception('Erro');
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