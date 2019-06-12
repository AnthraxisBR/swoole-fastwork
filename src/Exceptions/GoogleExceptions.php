<?php


namespace AnthraxisBR\FastWork\Exceptions;


class GoogleExceptions extends BaseException
{

    public function __construct($message = '', $errors = [])
    {

        parent::__construct(json_encode($message));
    }


}