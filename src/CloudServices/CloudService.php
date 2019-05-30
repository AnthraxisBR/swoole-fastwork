<?php


namespace AnthraxisBR\SwooleFW\CloudServices;


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
        var_dump($this->cloudFunctionsTypes);
        $this->implemented = new $this->cloudFunctionsTypes[$this->serviceProvider]();
    }

    public function call($command, $args)
    {
        if(count($args) > 0){
            return call_user_func($this->{$command}, $args);
        }
        return $this->{$command}();
    }

}