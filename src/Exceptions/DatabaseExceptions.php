<?php


namespace AnthraxisBR\FastWork\Exceptions;


class DatabaseExceptions extends \Exception
{

    public function __construct($message = [])
    {
        parent::__construct(json_encode($message));
    }
}