<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\S3;


use AnthraxisBR\SwooleFW\CloudServices\GCP\Storage\StorageClient;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;


class Bucket extends StorageClient implements FwObjectStorageInterface
{
    public $content;

    public $bucket;

    public $name;

    public function __construct($content)
    {
        $this->content = $content;
        parent::__construct();
    }

    public function createFolder(string $foldername)
    {
        $this->sendToCloud();
    }

    public function setBody($content)
    {
        $this->content = $content;
        return $this;
    }

    public function setFilename($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setTarget($bucket)
    {
        $this->bucket = $bucket;
        return $this;
    }

    public function uploadObject()
    {
        return  $this->putObject($this->getObjectConfig());
    }

    public function getObjectConfig()
    {
        return [
            'Bucket' => $this->bucket,
            'Key' => $this->key,
            'Body' => $this->body
        ];
    }
}