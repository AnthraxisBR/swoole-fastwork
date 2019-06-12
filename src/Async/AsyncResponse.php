<?php


namespace AnthraxisBR\FastWork\Async;


class AsyncResponse
{
    public function resp($resp)
    {
        echo 'Response: ' . $resp;
        return $resp;
    }
}