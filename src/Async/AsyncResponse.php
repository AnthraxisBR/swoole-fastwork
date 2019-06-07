<?php


namespace AnthraxisBR\SwooleFW\Async;


class AsyncResponse
{
    public function resp($resp)
    {
        echo 'Response: ' . $resp;
        return $resp;
    }
}