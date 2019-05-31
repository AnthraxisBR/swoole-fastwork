<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda;

use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\CloudServices\CloudServices;
use Aws\Lambda\LambdaClient as LambdaClientAws;

class LambdaClient
{

    /**
     * @var LambdaClientAws
     */
    public $client;



    public function __construct(CloudFunctions $object)
    {

        $this->checkCloudFunctionBeforeInstantiateLambdaClient($object);

        $client_config = [
            'version' => $object->getVersion(),
            'region' => $object->getRegion()
        ];

        $this->client = new LambdaClientAws($client_config);

    }

    public function checkCloudFunctionBeforeInstantiateLambdaClient(CloudFunctions $object)
    {
        $object->validateRegion();
    }

}