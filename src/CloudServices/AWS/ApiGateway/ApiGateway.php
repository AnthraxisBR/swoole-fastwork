<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\ApiGateway;


use AnthraxisBR\SwooleFW\CloudServices\Endpoints\FwEndpointsInterface;

class ApiGateway extends ApiGatewayClient implements FwEndpointsInterface
{

    public function createEndpoint(array $array)
    {
        return $this->awsClient()->createRestApi($array);
    }

    public function deleteEndpoint(array $array)
    {
        return $this->awsClient()->deleteApiKey($array);
    }

    public function getEndpoint(array $array)
    {
        return $this->awsClient()->getRestApi($array);
    }

    public function getEndpoints(array $array)
    {
        return $this->awsClient()->getRestApis();
    }

    public function updateEndpoint(array $array)
    {
        return $this->awsClient()->updateRestApi($array);
    }
}