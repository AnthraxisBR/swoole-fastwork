<?php


namespace AnthraxisBR\FastWork\CloudServices\AWS\Lambda;

use AnthraxisBR\FastWork\CloudServices\AWS\ClientsConfigTrait;
use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\FastWork\CloudServices\CloudServices;
use Aws\Lambda\LambdaClient as LambdaClientAws;

class LambdaClient
{

    use ClientsConfigTrait;
    /**
     * @var LambdaClientAws
     */
    public $client;



    public function __construct(CloudFunctions $object)
    {

        $this->checkCloudFunctionBeforeInstantiateLambdaClient($object);

        $this->setConfigFromCloudFunction($object);

        $this->client = new LambdaClientAws($this->config);

    }

}