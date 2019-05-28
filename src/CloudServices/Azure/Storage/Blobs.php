<?php


namespace AnthraxisBR\SwooleFW\CloudServices\Azure\Storage;


use AnthraxisBR\SwooleFW\CloudServices\Azure\Azure;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;


class Blobs extends Azure implements FwObjectStorageInterface
{

    public $content;

    public $container;

    public $name;

    public function createFolder(string $foldername)
    {

    }

    public function setBody($content)
    {
        $this->content = $content;
    }

    public function setFilename($name)
    {
        $this->name = $name;
    }

    public function setTarget($container)
    {
        $this->container = $container;
    }

    public function uploadObject()
    {
        $this->blob_client->createBlockBlock($this->container, $this->name, $this->content);
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