<?php


namespace App\CloudServices\CloundFunctions;


use AnthraxisBR\FastWork\CloudServices\AWS\Regions\Regions;
use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\FastWork\CloudServices\CloudFunctions\RuntimeOptions;
use App\CloudServices\IAM\Roles\LambdaBasicExecution;

class GetUrlCloudFunction extends CloudFunctions
{

    public $serviceProvider = 'AWS';//'GCP';

    public $git = 'https://github.com/AnthraxisBR/get-url-cloud-function.git';

    public $locations = Regions::sa_east_1;

    public $runtime = RuntimeOptions::runtime_aws_python_3_6;

    public $role = LambdaBasicExecution::class;

    public $handler  = 'get_url_cloud_function';

}