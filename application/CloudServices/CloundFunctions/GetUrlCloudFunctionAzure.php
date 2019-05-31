<?php


namespace App\CloudServices\CloundFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Regions\Regions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\RuntimeOptions;
use App\CloudServices\IAM\Roles\LambdaBasicExecution;

class GetUrlCloudFunctionAzure extends CloudFunctions
{

    public $serviceProvider = 'Azure';//'GCP';

    public $git = 'https://github.com/AnthraxisBR/get-url-cloud-function.git';

    public $locations = Regions::sa_east_1;

    public $runtime = RuntimeOptions::runtime_aws_python_3_6;

    public $role = LambdaBasicExecution::class;

    public $handler  = 'get_url_cloud_function';

}