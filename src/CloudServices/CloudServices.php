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

    public $command;

    public $use;

    public function __construct()
    {

    }

    /**
     * Start a new CloudService From class instance type
     * @param $object
     */
    public function exec($object)
    {
        try {

            return $object->{$this->command}();
        }catch (\Exception $e){
            var_dump($e->getMessage());
            return [];
        }

    }

    /**
     *
     * @param string $service
     */
    public function setService(string $service )
    {
        $this->service = $service;
    }

    /**
     * @param string $command
     */
    public function command(string $command )
    {
        $this->command = $command;
    }

    /**
     * Define the service target (AWS, Azure, GCP)
     * @param $service
     */
    public function use($use)
    {
        $this->use = $use;
    }
}