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

        $this->exec();

    }


    public function exec()
    {


        \Swoole\Async::dnsLookup("localhost", function ($domainName, $ip) {

            //$this->result = call_user_func_array($this->closure, $this->args);
            try{
                $this->result = call_user_func($this->closure, $this->args);
            }catch (\Exception $e){
                $this->result = '';
                $this->exception = $e->getMessage();
            }
            $this->result = 'asdasdas';
        });
        return $this;
    }

    public function then($closure)
    {
        while (true){
            var_dump($this->result);
            if(!is_null($this->result)){
                $closure($this->result);
                var_dump('then');
            }

        }
        return $this;
    }

    public function catch($closure)
    {

        $closure($this->exception);
        var_dump('catch');
        return $this;
    }
}