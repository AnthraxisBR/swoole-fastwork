<?php


namespace AnthraxisBR\SwooleFW\CloudServices;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda\Lambda;
use AnthraxisBR\SwooleFW\CloudServices\Azure\AzureFunction\AzureFunction;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\GoogleCloudFunction;
use Aws\Lambda\LambdaClient;

class CloudService
{

    public $request;

    public $implemented;


    public function __construct()
    {
        $this->setCloudFunctionClass();

    }

    public function setCloudFunctionClass()
    {
        if($this->cloudFunctionsTypes[strtolower($this->serviceProvider)] == GoogleCloudFunction::class){
            $this->implemented = new $this->cloudFunctionsTypes[strtolower($this->serviceProvider)]();
        }
        if ($this->cloudFunctionsTypes[strtolower($this->serviceProvider)] ==  Lambda::class){
            $this->implemented = new $this->cloudFunctionsTypes[strtolower($this->serviceProvider)]($this);
        }

        if ($this->cloudFunctionsTypes[strtolower($this->serviceProvider)] ==  AzureFunction::class){
            $this->implemented = new $this->cloudFunctionsTypes[strtolower($this->serviceProvider)]($this);
        }

    }


    public function call($command, $args)
    {
        if(count($args) > 0){

        }
        return call_user_func_array([$this->implemented,$command], [$this]);
        //return $this->implemented->{$command}();
    }

}