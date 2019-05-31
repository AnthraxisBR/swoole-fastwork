<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda;


use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctionInterface;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\Exceptions\AwsLambdaExceptions;

class Lambda extends LambdaClient implements CloudFunctionInterface
{


    public function createCloudFunction(CloudFunctions $CloudFunctions)
    {
        try {
            $this->client->createFunction($CloudFunctions->getAWSFunctionArray());
        } catch (\Exception $e){
            try {
                throw new AwsLambdaExceptions($e->getMessage());
            } catch (AwsLambdaExceptions $e){
                return $e->getMessage();
            }
        }
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