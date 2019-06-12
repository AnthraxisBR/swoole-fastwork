<?php


namespace AnthraxisBR\FastWork\CloudServices;


use AnthraxisBR\FastWork\CloudServices\AWS\S3\Bucket;
use AnthraxisBR\FastWork\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\FastWork\CloudServices\ObjectStorage\ObjectStorage;
use AnthraxisBR\FastWork\http\Request;
use AnthraxisBR\FastWork\traits\Injection;

/**
 * @method CloudFunctions createCloudFunction(){
 *      Create cloud function from object
 * }
 *
 * Class CloudServices
 * @package AnthraxisBR\FastWork\CloudServices
 */
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

    /**
     * @param $name
     * @param $arguments
     * @return array|mixed
     */
    public function __call($name, $arguments)
    {
        if(method_exists($this, $name)){
            return call_user_func_array($this->{$name}, $arguments);

        } else {

            try {
                $this->command = $name;
                return $this->service->call($this->command, $arguments);
                //return call_user_func_array($this->service->{$this->command}, $arguments);
            }catch (\Exception $e){
                var_dump($e->getMessage());
                return [];
            }
        }
    }

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
     *
     * @param string $service
     */
    public function createService(CloudService $service )
    {
        $this->service = $service;
        return $this->service;
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

    /**
     * @param null $service
     * @return array
     */
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
    public function use(string $use)
    {
        $this->use = $use;
    }

}