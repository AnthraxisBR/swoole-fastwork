<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS;


use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;

trait ClientsConfigTrait
{

    /**
     * @param CloudFunctions $object
     * @throws \AnthraxisBR\SwooleFW\Exceptions\AwsLambdaExceptions
     * @throws \ReflectionException
     */
    public function checkCloudFunctionBeforeInstantiateLambdaClient(CloudFunctions $object)
    {
        $object->validateRegion();
    }


    public function setConfigFromCloudFunction(CloudFunctions $cloudFunctions)
    {

        $this->config = [
            'version' => $cloudFunctions->getVersion(),
            'region' => $cloudFunctions->getRegion()
        ];

    }
}