<?php


namespace AnthraxisBR\SwooleFW\CloudServices;


use AnthraxisBR\SwooleFW\CloudServices\AWS\S3\Bucket;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\ObjectStorage;
use AnthraxisBR\SwooleFW\traits\Injection;

class CloudServices
{
    use Injection;

    public static $injection_reference = 'cloud_services';

    public $service;

    public $service_object;

    public function __construct()
    {

    }

    /**
     * Start a new CloudService From class instance type
     * @param $object
     */
    public function new($object)
    {
        $this->service_object = ServiceCommuting::checkService($object);
    }

    /**
     * Define the service target (AWS, Azure, GCP)
     * @param $service
     */
    public function use($service)
    {
        $this->service = $service;
    }
}