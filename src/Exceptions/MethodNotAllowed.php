<?php


namespace AnthraxisBR\SwooleFW\Exceptions;


class MethodNotAllowed extends BaseException
{
    public function __construct($message = [], $method)
    {
        if(count($message) == 0){
            $message['message'] = 'Http method ' . $method . ' not allowed on this route';
        }

        parent::__construct(json_encode($message));
    }

}