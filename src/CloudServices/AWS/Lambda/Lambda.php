<?php


namespace AnthraxisBR\FastWork\CloudServices\AWS\Lambda;


use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctionInterface;
use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\FastWork\Exceptions\AwsLambdaExceptions;
use Aws\Lambda\Exception\LambdaException;

class Lambda extends LambdaClient implements CloudFunctionInterface
{


    public function createCloudFunction(CloudFunctions $CloudFunctions)
    {
        try {
            $this->client->createFunction($CloudFunctions->getAWSFunctionArray());
        } catch (LambdaException $e){
            try {
                return json_decode($e->getResponse()->getBody());
            } catch (AwsLambdaExceptions $e){
                return $e->getMessage();
            } catch (\Exception $e){
                return [
                    'message' => 'Erro não identificado ao tentar criar um Lambda Function',
                    'errors' => [
                        $e->getMessage()
                    ]
                ];
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