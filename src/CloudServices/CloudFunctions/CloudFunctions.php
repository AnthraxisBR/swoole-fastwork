<?php


namespace AnthraxisBR\SwooleFW\CloudServices\CloudFunctions;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda\Lambda;
use AnthraxisBR\SwooleFW\CloudServices\Azure\AzureFunction\AzureFunction;
use AnthraxisBR\SwooleFW\CloudServices\CloudService;
use AnthraxisBR\SwooleFW\CloudServices\CloudServicesCommandsInterface;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\CloudFunctionClient;
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

    public const cloudFunctionsTypes = [
            'gcp' => GoogleCloudFunction::class,
            'aws' => Lambda::class,
            'azure' => AzureFunction::class
        ];


    public function readCommand(string $command){

    }

}