<?php

namespace AnthraxisBR\FastWork\tasks;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\Http\Request;
use ReflectionMethod;

class Tasks
{
    public static $data;
    public static $server;
    public static $headers;
    public static $signature;

    public function __construct($serv, $task_id, $from_id, $data)
    {

    }

    public static function run($serv, $task_id, $from_id, $data)
    {
        return self::runPrepareSignaturedClass(self::readData($serv, $task_id, $from_id, $data));
    }

    public static function runPrepareSignaturedClass($data)
    {

        $exp = explode('@',$data['signature']);

        $ReflectionMethod = new ReflectionMethod('\App\tasks\\' . $exp[0], $exp[1]);
        $parameters = $ReflectionMethod->getParameters();

        $class = '\App\tasks\\' . $exp[0];
        $function = $exp[1];

        $application = new $class();

        $attr = [];

        $c = 0;
        foreach ($parameters as $param){

            if ($param->getClass() instanceof \ReflectionClass){
                $ref = $param->getClass()->name;
                $attr[$c] = new $ref();

                if($attr[$c] instanceof Entities){
                    if(!is_null($data['entity'])){
                        $attr[$c] = $data['entity'];
                    }
                }
                $c += 1;
            }


        }

        $attr[] = $data['data'];

        return call_user_func_array([$application,$function],$attr);

    }

    public static function readData($serv, $task_id, $from_id, $data)
    {
        $data['serv'] = $serv;
        return $data;

        self::$server = $data->server;
        self::$headers = $data->headers;
        self::$data = $data->data;
        self::$signature = $data->signature;
    }

}