<?php


namespace AnthraxisBR\SwooleFW\Async;


class Promisse
{

    public $closure;
    public $args;
    public $result;
    public $exception;

    public function __construct($closure)
    {
        $this->closure = $closure;

        //$this->exec();
    }


    public function exec()
    {

        $ref = $this;

        \Swoole\Async::dnsLookup("localhost", function ($domainName, $ip) use (&$ref) {
           // $this->result = call_user_func_array($this->closure, $this->args);
            try{
                $closure = $ref->closure;
                $reflection = new \ReflectionFunction($closure);
                $arguments  = $reflection->getParameters();

                $args = [];

                foreach ($arguments as $argument) {
                    $args[] = $argument->getName();
                }


                $ref->result = call_user_func_array($closure, [new AsyncResponse()]);


            }catch (\Exception $e){
                $ref->exception = $e->getMessage();
                $ref->closure($ref->result);
            }
        });
        return $this;
    }

    public function then($closure)
    {

    }

    public function catch($closure)
    {

        $closure($this->exception);
        var_dump('catch');
        return $this;
    }
}