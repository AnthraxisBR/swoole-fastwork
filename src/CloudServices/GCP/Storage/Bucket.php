<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\Storage    ;


use AnthraxisBR\SwooleFW\CloudServices\FwObjectStorageInterface;
use AnthraxisBR\SwooleFW\CloudServices\GCP\Google;


class Bucket extends StorageClient implements FwObjectStorageInterface
{
    public $object;

    public $bucket;

    public $key;

    public $filename;

    public function createFolder(string $foldername)
    {
        $this->sendToCloud();
    }

    public function setBody($body)
    {
        $this->object = $body;
    }

    public function setFilename($name)
    {
        $this->name = $name;
    }

    public function setTarget($bucket)
    {
        $this->bucket = $bucket;
    }

    public function sendToCloud()
    {
        $this->putObject($this->getObjectConfig());
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