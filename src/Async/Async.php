<?php


namespace AnthraxisBR\FastWork\Async;


use AnthraxisBR\FastWork\Prototype\Prototype;

class Async extends Prototype
{

    public $await = false;

    public function await()
    {
        $this->await = true;
    }

    public function run()
    {

    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }
}