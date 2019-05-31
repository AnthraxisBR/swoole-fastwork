<?php


namespace AnthraxisBR\SwooleFW\CloudServices\CloudFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Arn\Arn;
use AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda\Lambda;
use AnthraxisBR\SwooleFW\CloudServices\AWS\Regions\Regions;
use AnthraxisBR\SwooleFW\CloudServices\Azure\AzureFunction\AzureFunction;
use AnthraxisBR\SwooleFW\CloudServices\CloudService;
use AnthraxisBR\SwooleFW\CloudServices\CloudServicesCommandsInterface;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\CloudFunctionClient;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\CloudFunctionObject;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\GoogleCloudFunction;
use AnthraxisBR\SwooleFW\CloudServices\IAM\AccountService;
use AnthraxisBR\SwooleFW\Exceptions\AwsLambdaExceptions;
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
     * @var string
     */
    public $version = 'latest';


    /**
     * @var bool
     */
    public $publish = false;


    public $network;

    public $labels;

    public $max_instances;

    public $enviromentVariables;

    public $entryPoint;

    public $https_trigger;

    public $event_trigger;

    public $handler  = 'cloud_function';

    public $function_version = null;
    public $alias_name = null;

    /**
     * @var AccountService
     */
    public $account = null;

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

    public function __construct()
    {
        if(is_null($this->function_name)){
            $this->function_name = 'GetUrlCloudFunction';
        }

        parent::__construct();
    }


    public function getAWSFunctionArray()
    {
        return [
            'FunctionName' => $this->function_name,
            // Runtime is required
            'Runtime' => $this->runtime,
            // Role is required
            'Role' => $this->getRole(),
            // Handler is required
            'Handler' => $this->handler,
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

    public function getRole()
    {
        return (string) new Arn($this);
    }

    /**
     * @throws AwsLambdaExceptions
     * @throws \ReflectionException
     */
    public function validateRegion()
    {
        $region = $this->getRegion();

        $reflection = new \ReflectionClass(Regions::class);

        if($this->serviceProvider == 'AWS'){
            if(!in_array($region, array_values($reflection->getConstants()))){
                throw new AwsLambdaExceptions('Region specified in ' . get_class($this) . ' does not can be used with a AWS Lambda Function, see regions available for aws: AnthraxisBR\SwooleFW\CloudServices\AWS\Regions\Regions');
            }
        }elseif($this->serviceProvider == 'GCP'){

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

    public function getAccountId()
    {
        return (new $this->account())->id;
    }
    public function getAccount()
    {
        return new $this->account();
    }

    public function hasFunctionVersion() : bool
    {
        return (bool) !is_null($this->function_version );
    }

    public function getFunctionVersion() : string
    {
        return (string) $this->function_version;
    }

    public function hasAliasName() : bool
    {
        return (bool) !is_null($this->alias_name );
    }

    public function getAliasName() : string
    {
        return (string) $this->alias_name;
    }


    public function getFunctionName() : string
    {
        return (string) $this->function_name;
    }

    /**
     * arn:aws:lambda:sa-east-1:123456789:function:GetUrlCloudFunction"
     * arn:aws:lambda:region:account-id:function:function-name
     * arn:(aws[a-zA-Z-]*)?:iam::\\d{12}:role/?[a-zA-Z_0-9+=,.@\\-_/]+ -
     * @return string
     */
    public function getApplicationName() : string
    {
        return (string)  $this->application_name;
    }

    public function getLocation($index): string
    {
        return (string) $this->locations[$index];
    }

    public function getRegion(): string
    {
        return (string) $this->locations;
    }

    public function getVersion(): string
    {
        return (string) $this->version;
    }

    public function getRuntime(): string
    {
        return (string) $this->runtime;
    }

    public function getMemoryAvailable(): int
    {
        return (int) $this->memory_size;
    }

    public function getEntryPoint()
    {
        return $this->handler;
    }

    public function getEnviromentVariables()
    {
        return $this->enviromentVariables;
    }

    public function getEventTrigger()
    {
        return $this->event_trigger;
    }

    public function getHttpsTrigger()
    {
        return $this->https_trigger;
    }

    public function getLabels()
    {
        return $this->labels;
    }

    public function getMaxInstances()
    {
        return $this->max_instances;
    }

    public function getNetwork()
    {
        return $this->network;
    }

    public function readCommand(string $command){

    }

}