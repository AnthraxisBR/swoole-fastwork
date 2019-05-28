<?php


namespace AnthraxisBR\SwooleFW\CloudServices\Azure\Storage;


use AnthraxisBR\SwooleFW\CloudServices\Azure\Azure;
use AnthraxisBR\SwooleFW\CloudServices\FwObjectStorageInterface;

class Blobs extends Azure implements FwObjectStorageInterface
{

    public $body;

    public $bucket;

    public $key;

    public function createFolder(string $foldername)
    {

    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setFilename($key)
    {
        $this->key = $key;
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