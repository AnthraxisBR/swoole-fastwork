<?php


namespace AnthraxisBR\FastWork\CloudServices\AWS;


use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctions;

trait ClientsConfigTrait
{

    /**
     * @param CloudFunctions $object
     * @throws \AnthraxisBR\FastWork\Exceptions\AwsLambdaExceptions
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