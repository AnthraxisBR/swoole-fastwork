<?php


namespace AnthraxisBR\SwooleFW\Exceptions;


use Throwable;

class DatabaseExceptions extends \Exception
{

    public function __construct($message = [])
    {
        parent::__construct(json_encode($message));
    }
}