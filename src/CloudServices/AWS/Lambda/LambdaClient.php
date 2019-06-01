<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda;

use AnthraxisBR\SwooleFW\CloudServices\AWS\ClientsConfigTrait;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\CloudServices\CloudServices;
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