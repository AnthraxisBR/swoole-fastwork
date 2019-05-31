<?php


namespace AnthraxisBR\SwooleFW\CloudServices\CloudFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda\Lambda;
use AnthraxisBR\SwooleFW\CloudServices\Azure\AzureFunction\AzureFunction;
use AnthraxisBR\SwooleFW\CloudServices\CloudService;
use AnthraxisBR\SwooleFW\CloudServices\CloudServicesCommandsInterface;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\CloudFunctionClient;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\CloudFunctionObject;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\GoogleCloudFunction;
use Cz\Git\GitRepository;
use PhpZip\ZipFile;

class CloudFunctions extends CloudService implements CloudServicesCommandsInterface
{
    /**
     * @var string
     */
    public $serviceProvider;

    /**
     * @var string
     */
    public $function_name = null;

    /**
     * @var string
     */
    public $description = null;

    /**
     * @var string
     */
    public $runtime = null;

    /**
     * @var string
     */
    public $role = null;

    /**
     * @var int
     */
    public $timeout;

    /**
     * @var int
     */
    public $memory_size;

    /**
     * @var string
     */
    public $git = null;

    /**
     * @var bool
     */
    public $publish = false;

    /**
     * @var CloudFunctionInterface
     */

    /**
     * @var string
     */
    public $application_name = null;

    public $cloudFunctionsTypes = [
            'gcp' => GoogleCloudFunction::class,
            'aws' => Lambda::class,
            'azure' => AzureFunction::class
        ];


    public function getAWSFunctionArray()
    {
        return [
            'FunctionName' => $this->function_name,
            // Runtime is required
            'Runtime' => $this->runtime,
            // Role is required
            'Role' => $this->role,
            // Handler is required
            'Handler' => '$this->h',
            // Code is required
            'Code' => $this->getFunctionCode()/*array(
                'ZipFile' => '',
                'S3Bucket' => 'string',
                'S3Key' => 'string',
                'S3ObjectVersion' => 'string',
            )*/,
            'Description' => 'string',
            'Timeout' => 20,
            'MemorySize' => 512,
            'Publish' => false,
        ];
    }

    public function getFunctionCode()
    {
        if(!is_null($this->git)){

            $location = getenv('root_folder') . 'repositories/cloud-functions/'. $this->function_name;

            if(is_dir($location)){
                $this->rrmdir($location);
            }

            $repo = GitRepository::cloneRepository($this->git, $location);

            try {
                $microtime = microtime();

                $zip = new ZipFile();

                while (true){
                    sleep(0.5);
                    var_dump($microtime);
                    if(!is_dir($location)){
                        continue;
                    }


                    $di = new \RecursiveDirectoryIterator($location);
                    foreach (new \RecursiveIteratorIterator($di) as $filename => $file) {
                        if(!strpos($filename, '.git/') and !strpos($filename, '.idea')){
                            if(is_file($filename)){
                                var_dump($filename);
                                $zip->addFile($filename);
                            }
                        }
                    }

                    break;

                }

                $zip->saveAsFile($location . '/'. $this->function_name . '.zip')
                    ->close();

                return [ 'ZipFile' =>$location . '/'. $this->function_name . '.zip' ];
            }catch (\Exception $e){
                var_dump($e->getMessage());
            }
        }
    }


    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir")
                        $this->rrmdir($dir."/".$object);
                    else unlink   ($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    public function getGoogleFunctionObject()
    {

        $CloudFunctionClient = new CloudFunctionObject();
        $CloudFunctionClient->name = $this->function_name;
        $CloudFunctionClient->description = $this->description;
        $CloudFunctionClient->runtime = $this->getRuntime();
        $CloudFunctionClient->availableMemoryMb = $this->getMemoryAvailable();
        $CloudFunctionClient->entryPoint = $this->getEntryPoint();
        $CloudFunctionClient->enviromentVariables = $this->getEnviromentVariables();
        $CloudFunctionClient->eventTrigger = $this->getEventTrigger();
        $CloudFunctionClient->httpsTrigger = $this->getHttpsTrigger();
        $CloudFunctionClient->labels = $this->getLabels();
        $CloudFunctionClient->maxInstances = $this->getMaxInstances();
        $CloudFunctionClient->network = $this->getNetwork();
        return $CloudFunctionClient;
        //$CloudFunctionClient->application_name = (is_null($this->application_name) ? getenv('application_name'): $this->application_name); ;
    }

    public function getApplicationName()
    {
        return $this->application_name;
    }

    public function getLocation($index)
    {
        return $this->locations[$index];
    }

    public function getRuntime()
    {
        return '';
    }

    public function getMemoryAvailable()
    {
        return '';
    }

    public function getEntryPoint()
    {
        return '';
    }

    public function getEnviromentVariables()
    {
        return '';
    }

    public function getEventTrigger()
    {
        return '';
    }

    public function getHttpsTrigger()
    {
        return '';
    }

    public function getLabels()
    {
        return '';
    }

    public function getMaxInstances()
    {
        return '';
    }

    public function getNetwork()
    {
        return '';
    }

    public function readCommand(string $command){

    }

}