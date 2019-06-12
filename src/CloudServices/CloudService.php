<?php


namespace AnthraxisBR\FastWork\CloudServices;


use AnthraxisBR\FastWork\CloudServices\AWS\ApiGateway\ApiGateway;
use AnthraxisBR\FastWork\CloudServices\AWS\Lambda\Lambda;
use AnthraxisBR\FastWork\CloudServices\Azure\AzureFunction\AzureFunction;
use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\FastWork\CloudServices\Endpoints\Endpoints;
use AnthraxisBR\FastWork\CloudServices\GCP\GoogleCloudFunction\GoogleCloudFunction;


/**
 * That class is base for cloud services classes
 * Class CloudService
 * @package AnthraxisBR\FastWork\CloudServices
 */
class CloudService
{

    public $request;

    /**
     * @var ApiGateway|GoogleCloudFunction|Lambda|AzureFunction
     */
    public $implemented;


    public function __construct()
    {
        if (isset($this->cloudFunctionsTypes)) {
            $this->setCloudFunctionClass();
        }
        if (isset($this->endpointsTypes)) {
            $this->setEndpointsClass();
        }

    }

    /**
     * Define instance class function when Cloud Service id Enpoints
     */
    public function setEndpointsClass()
    {
        /**
         * @see Endpoints
         *      ->public->endpointsTypes
         */
        if($this->endpointsTypes[strtolower($this->serviceProvider)] == ApiGateway::class){
            $this->implemented = new $this->endpointsTypes[strtolower($this->serviceProvider)]();
        }

    }

    /**
     * Define instance class function when Cloud Service id Cloud Function
     */
    public function setCloudFunctionClass() : void
    {
        /**
         * @see CloudFunctions
         *      ->public->cloudFunctionsTypes
         */
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
    }

}