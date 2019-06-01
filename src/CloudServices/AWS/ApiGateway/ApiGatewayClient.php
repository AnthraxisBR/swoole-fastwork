<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\ApiGateway;


use AnthraxisBR\SwooleFW\CloudServices\AWS\ClientsConfigTrait;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;

class ApiGatewayClient
{

    use ClientsConfigTrait;
    /**
     * @var \Aws\ApiGateway\ApiGatewayClient
     */
    public $client;

    /**
     * @var array
     */
    public $config;

    public function __construct(CloudFunctions $cloudFunctions)
    {
        $this->checkCloudFunctionBeforeInstantiateLambdaClient($cloudFunctions);

        $this->setConfigFromCloudFunction($cloudFunctions);

        $this->client = new \Aws\ApiGateway\ApiGatewayClient($this->config);
    }

    /**
     * @return \Aws\ApiGateway\ApiGatewayClient
     */
    public function awsClient() : \Aws\ApiGateway\ApiGatewayClient
    {
        return $this->client;
    }


}