<?php

namespace AnthraxisBR\SwooleFW\tasks;


use AnthraxisBR\SwooleFW\http\Request;
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
        return self::runPrepareSignaturedClass(self::readData($data));
    }

    public static function runPrepareSignaturedClass($data)
    {

        $exp = explode('@',$data->signature);

        $ReflectionMethod = new ReflectionMethod('\App\tasks\\' . $exp[0], $exp[1]);
        $parameters = $ReflectionMethod->getParameters();

        $class = '\App\tasks\\' . $exp[0];
        $function = $exp[1];

        $application = new $class();

        $attr = [];
        foreach ($parameters as $param){

            if ($param->getClass() instanceof \ReflectionClass){
                $ref = $param->getClass()->name;
                $attr[] = new $ref();
            }


        }

        $attr[] = $data;

        return call_user_func_array([$application,$function],$attr);

    }

    public static function readData($data)
    {
        $data = json_decode($data);

        return $data;

        self::$server = $data->server;
        self::$headers = $data->headers;
        self::$data = $data->data;
        self::$signature = $data->signature;
    }

}