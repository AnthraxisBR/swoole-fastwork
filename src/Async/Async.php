<?php


namespace AnthraxisBR\SwooleFW\Async;


use AnthraxisBR\SwooleFW\Prototype\Prototype;

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