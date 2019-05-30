<?php


namespace App\CloudServices\CloundFunctions;


use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;

class GetUrlLambdaFunction extends CloudFunctions
{
    public $function_name = 'GetUrlLambdaFunction';

    public $git = 'https://github.com/AnthraxisBR/get-url-cloud-function.git';

    public $language = 'python';

    public function boot()
    {
        $this->assign();
    }
}