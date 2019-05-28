<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\S3;


use AnthraxisBR\SwooleFW\CloudServices\FwObjectStorageInterface;


class Bucket extends S3 implements FwObjectStorageInterface
{
    public $body;

    public $bucket;

    public $key;

    public function createFolder(string $foldername)
    {
        $this->sendToCloud();
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