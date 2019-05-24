<?php


namespace GabrielMourao\SwooleFW\providers;


use GabrielMourao\SwooleFW\database\Entities;
use GabrielMourao\SwooleFW\http\Request;

class BaseProvider
{


    public function getInstance($parameters, $swoole_request)
    {
        $class = null;
        foreach ($parameters as $item){
            $name = $item->getClass()->name;
            $reflector = new \ReflectionClass($name);
            var_dump($name);
            var_dump($this->object_reference);
            var_dump('looped');
            if($reflector->isSubclassOf($this->object_reference) || is_a($name ,$this->object_reference,true)){
                $class = $item->getClass()->name;
                break;
            }
        }
        if(!is_null($class)){
            if(is_a($class ,Request::class,true)){
                $inst = new $class($swoole_request);
            }else{
                $inst = new $class();
            }

            $inst->name = $this->name;
            return $inst;
        }else{
            return null;
        }
    }
}