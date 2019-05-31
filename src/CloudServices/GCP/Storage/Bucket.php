<?php


namespace AnthraxisBR\SwooleFW\CloudServices\GCP\Storage;


use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;
use AnthraxisBR\SwooleFW\CloudServices\GCP\Google;


class Bucket implements FwObjectStorageInterface
{

    public $acl;

    public $cache_control;

    /**
     * @var string|null
     */
    public $content_disposition = null;


    /**
     * @var string|null
     */
    public $content_enconding = null;


    /**
     * @var string|null
     */
    public $content_language = null;

    /**
     * @var string|null
     */
    public $content_type = null;

    /**
     * @var
     */
    public $crc32c;

    public $event_based_hold;

    public $md5_hash;

    public $metadata;

    public $metadata_key;

    public $name;

    public $storage_class;

    public $bucket;

    /**
     * @var StorageClient
     */
    public $client;

    public function __construct()
    {
        $this->client = new StorageClient();
    }

    public function createFolder(string $foldername)
    {
        $this->sendToCloud();
    }

    public function setBody(string $content)
    {
        $this->metadata = $content;
    }

    public function setFilename($name)
    {
        $this->name = $name;
    }

    public function setTarget($bucket)
    {
        $this->metadata_key = (string) $bucket;
    }

    public function uploadObject()
    {
        return $this->client->upload($this->metadata, [
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