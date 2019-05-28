<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\Storage    ;


use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;
use AnthraxisBR\SwooleFW\CloudServices\GCP\Google;


class Bucket implements FwObjectStorageInterface
{
    public $object;

    public $bucket;

    public $key;

    public $name;

    public $client;

    public function __construct()
    {
        $this->client = new StorageClient();
    }

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

    public function uploadObject()
    {
        return $this->client->upload($this->file, [
            'name' => $this->name
        ]);
    }

    public function listObjects()
    {
        return $this->client->objects();
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->client->object($this->name);
    }


    /**
     * @return mixed
     */
    public function deleteObject()
    {
        return $this->client->getObject()->delete();
    }

    /**
     *
     */
    public function deleteFolder()
    {
        return $this->client->bucket($this->bucket)->delete();
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