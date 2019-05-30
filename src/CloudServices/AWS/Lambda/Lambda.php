<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda;


use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctionInterface;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;

class Lambda extends LambdaClient implements CloudFunctionInterface
{


    public function createCloudFunction(CloudFunctions $CloudFunctions)
    {
        return $this->createFunction($CloudFunctions->getAWSFunctionArray());
    }

    public function callCloudFunction(CloudFunctions $CloudFunctions)
    {

    }

    public function deleteCloudFunction(CloudFunctions $CloudFunctions)
    {

    }

    public function getCloudFunctionDownloadUrl(CloudFunctions $CloudFunctions)
    {

    }

    public function getCloudFunctionUploadUrl(CloudFunctions $CloudFunctions)
    {

    }

    public function getCloudFunction(CloudFunctions $CloudFunctions)
    {

    }

    public function listCloudFunctions($location)
    {

    }

    public function patchCloudFunction(CloudFunctions $CloudFunctions)
    {

    }

}