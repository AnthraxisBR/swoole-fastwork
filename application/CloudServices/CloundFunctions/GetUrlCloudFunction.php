<?php


namespace App\CloudServices\CloundFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Regions\Regions;
use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;

class GetUrlCloudFunction extends CloudFunctions
{
    //public $application_name = 'projects/gabriel-baba1/locations/sa-east1';

    public $serviceProvider = 'AWS';//'GCP';

    public $function_name = 'GetUrlCloudFunction';

    public $git = 'https://github.com/AnthraxisBR/get-url-cloud-function.git';

    public $language = 'python';

    /**
     * Change if change Service
     * @var array
     */
    public $locations = [\AnthraxisBR\SwooleFW\CloudServices\GCP\Regions\Regions::southamerica_east1];//[Regions::sa_east_1];

    public $runtime = 'teste';

    public $role = 'teste';

    public function boot()
    {
        $this->assign();
    }
}