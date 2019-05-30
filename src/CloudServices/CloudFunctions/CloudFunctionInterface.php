<?php


namespace AnthraxisBR\SwooleFW\CloudServices\CloudFunctions;


use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;

interface CloudFunctionInterface
{

    public function createCloudFunction(CloudFunctions $CloudFunctions);

    public function callCloudFunction(CloudFunctions $CloudFunctions);

    public function deleteCloudFunction(CloudFunctions $CloudFunctions);

    public function getCloudFunctionDownloadUrl(CloudFunctions $CloudFunctions);

    public function getCloudFunctionUploadUrl(CloudFunctions $CloudFunctions);

    public function getCloudFunction(CloudFunctions $CloudFunctions);

    public function listCloudFunctions($location);

    public function patchCloudFunction(CloudFunctions $CloudFunctions);
}
