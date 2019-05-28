<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\S3;


use AnthraxisBR\SwooleFW\CloudServices\GCP\Storage\StorageClient;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;


class Bucket implements FwObjectStorageInterface
{
    public $content;

    public $bucket;

    public $name;

    public $client;

    public function __construct($content)
    {
        $this->content = $content;

        $this->client = new S3();
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

    /**
     * Return a single uploaded object
     * Use $obj['body'] to get content of object
     * @return mixed
     */
    public function uploadObject()
    {
        return $this->client->putObject($this->getObjectConfig());
    }

    /**
     * Return a list of objects
     * Use $obj['body'] to get content of object
     * @return mixed
     */
    public function listObjects()
    {
        return $this->client->listObjects([
            'Bucket' => $this->bucket
        ]);
    }

    /**
     * Return a single object
     * Use $obj['body'] to get content of object
     * @return mixed
     */
    public function getObject()
    {
        return $this->client->listObjects([
            'Bucket' => $this->bucket,
            'Key' => $this->name
        ]);
    }

    /**
     * Remove object from s3
     * @return \Aws\Result
     */
    public function deleteObject()
    {

        return $this->client->deleteObject([
            'Bucket' => $this->bucket,
            'Key' => $this->name
        ]);
    }

    /**
     * Remove full bucekt
     * @return \Aws\Result
     */
    public function deleteFolder()
    {
        return $this->client->deleteBucket($this->bucket);
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