<?php


namespace AnthraxisBR\SwooleFW\CloudServices;


use AnthraxisBR\SwooleFW\CloudServices\AWS\S3\Bucket;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\ObjectStorage;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\traits\Injection;

class CloudServices
{
    use Injection;

    public static $injection_reference = 'cloud_services';

    /**
     * @var CloudService
     */
    public $service;

    public $service_object;

    public $command;

    public $use;


    public function willGoToTask(Request $request)
    {
        $this->service->request = $request;
        return $this->service;
    }

    /**
     * Start a new CloudService From class instance type
     * @param $object
     */
    public function exec($object = null)
    {
        try {
            return $this->service->{$this->command}();
        }catch (\Exception $e){
            var_dump($e->getMessage());
            return [];
        }

    }

    /**
     *
     * @param string $service
     */
    public function setService(CloudService $service )
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return CloudService
     */
    public function getService()
    {
        return $this->service;
    }
    /**
     * @param string $command
     */
    public function command(string $command )
    {

        $this->command = $this->service->readCommand($command);
    }

    public function upload($service = null)
    {
        if(!is_null($service)){
            $this->service = $service;
        }

        $this->command = 'upload';
        return $this->exec();
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