<?php


namespace App\CloudServices\CloundFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Regions\Regions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\RuntimeOptions;
use App\CloudServices\IAM\SwooleAccount;

class GetUrlCloudFunction extends CloudFunctions
{

    public $account = SwooleAccount::class;
    //public $application_name = 'projects/gabriel-baba1/locations/sa-east1';

    public $serviceProvider = 'AWS';//'GCP';

    public $git = 'https://github.com/AnthraxisBR/get-url-cloud-function.git';

    public $locations = Regions::sa_east_1;
    //\AnthraxisBR\SwooleFW\CloudServices\GCP\Regions\Regions::southamerica_east1;

    public $runtime = RuntimeOptions::runtime_aws_python_3_6;

    public $role = 'teste';

    public $handler  = 'get_url_cloud_function';

    public function boot()
    {
        $this->assign();
    }
}