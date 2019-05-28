<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\Storage;

use AnthraxisBR\SwooleFW\CloudServices\GCP\GCPAuthHelper;
use Google\Cloud\Storage\StorageClient as GoogleStorageClient;

class StorageClient extends GoogleStorageClient
{

    public $config = [];

    public $bucket;

    public function __construct()
    {
        $this->setConfig();
        parent::__construct($this->config);
    }

    /**
     * Prepare config for GoogleClientStorage
     */
    public function setConfig()
    {
        $this->config = GCPAuthHelper::getGoogleCredentialsFile();
        /**
         * TODO: Prepare to receive all available configs
         * already accepts if is build correctly at 'cloud-services.yaml'
         */
        $this->config['keyFile'] = $this->readCredentialsFile();

        if(!is_null($this->bucket)){
            $this->bucket($this->getBucketName());
        }
    }

    /**
     * @return mixed
     */
    public function getBucketName(){
        return $this->bucket;
    }

    /**
     * Open file and decode
     * @return mixed
     */
    public function readCredentialsFile() : string
    {
        return json_decode(file_get_contents($this->config['KeyFile']));
    }

}