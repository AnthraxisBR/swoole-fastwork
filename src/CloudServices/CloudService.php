<?php


namespace AnthraxisBR\SwooleFW\CloudServices;


use AnthraxisBR\SwooleFW\CloudServices\AWS\Lambda\Lambda;
use AnthraxisBR\SwooleFW\CloudServices\GCP\GoogleCloudFunction\GoogleCloudFunction;
use Aws\Lambda\LambdaClient;

class CloudService
{

    public $request;

    public $implemented;


    public function __construct()
    {
        $this->setCloudFunctionClass();

        /*if(!is_null($this->git)){

            $location = getenv('root_folder') . '/repositories/cloud-functions';
            $repo = GitRepository::cloneRepository($this->git, $location);

            $zip = new ZipFile();

            $zip->addDir($repo->getRepositoryPath())
                ->saveAsFile(get_class($this) . '.zip')
                ->close();
        }*/
    }

    public function setCloudFunctionClass()
    {
        if($this->cloudFunctionsTypes[strtolower($this->serviceProvider)] == GoogleCloudFunction::class){
            $this->implemented = new $this->cloudFunctionsTypes[strtolower($this->serviceProvider)]();
        }elseif ($this->cloudFunctionsTypes[strtolower($this->serviceProvider)] ==  Lambda::class){
            var_dump('a');
            $this->implemented = new $this->cloudFunctionsTypes[strtolower($this->serviceProvider)]([]);
        }
        var_dump('aaa');
    }

    public function call($command, $args)
    {
        var_dump($args);
        if(count($args) > 0){

        }
        var_dump($this->implemented);
        return call_user_func_array([$this->implemented,$command], [$this]);
        //return $this->implemented->{$command}();
    }

}