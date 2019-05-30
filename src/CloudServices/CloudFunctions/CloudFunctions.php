<?php


namespace AnthraxisBR\SwooleFW\CloudServices\CloudFunctions;


use Cz\Git\GitRepository;
use PhpZip\ZipFile;

class CloudFunctions
{
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


    public function __construct()
    {
        if(!is_null($this->git)){

            $location = getenv('root_folder') . '/repositories/cloud-functions';
            $repo = GitRepository::cloneRepository($this->git, $location);

            $zip = new ZipFile();

            $zip->addDir($repo->getRepositoryPath())
                ->saveAsFile(get_class($this) . '.zip')
                ->close();
        }
    }

}