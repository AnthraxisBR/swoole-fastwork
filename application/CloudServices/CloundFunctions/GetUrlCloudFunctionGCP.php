<?php


namespace App\CloudServices\CloundFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Regions\Regions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\RuntimeOptions;
use App\CloudServices\IAM\Roles\LambdaBasicExecution;

class GetUrlCloudFunctionGCP extends CloudFunctions
{

    public $serviceProvider = 'GCP';//'GCP';

    public $git = 'https://reqres.in/api/users';//'https://github.com/AnthraxisBR/get-url-cloud-function.git';

    public $locations = Regions::sa_east_1;

    public $runtime = RuntimeOptions::runtime_gcp_python37;

    public $account = LambdaBasicExecution::class;

    public $handler  = 'get_url_cloud_function';

}