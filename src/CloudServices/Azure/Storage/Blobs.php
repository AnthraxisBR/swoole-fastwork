<?php


namespace AnthraxisBR\SwooleFW\CloudServices\Azure\Storage;


use AnthraxisBR\SwooleFW\CloudServices\Azure\Azure;
use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\FwObjectStorageInterface;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;


class Blobs extends Azure implements FwObjectStorageInterface
{

    public $content;

    public $container;

    public $name;

    public $client;

    public function __construct()
    {
        parent::__construct();

        $this->client = $this->getConnectionService();
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


    /**
     * Store a object into defined container
     * @return \MicrosoftAzure\Storage\Blob\Models\PutBlockResult
     */
    public function uploadObject()
    {
        return $this->client->createBlobBlock($this->container, $this->name, $this->content);
    }


    /**
     * Will return a list of blobs, call ->getContentStream() in list item to get blob content
     * @return [\MicrosoftAzure\Storage\Blob\Models\GetBlobResult]
     */
    public function listObjects()
    {
        $listBlobOption = new ListBlobsOptions();

        $listBlobOption->setPrefix($this->container);

        return $this->client->listBlob($this->container, $listBlobOption)->getBlobs();
    }

    /**
     * Use ->getContentStream() function to get blob content
     * @return \MicrosoftAzure\Storage\Blob\Models\GetBlobResult
     */
    public function getObject()
    {
        return $this->client->getBlob($this->container, $this->name);
    }

    /**
     * @return bool
     */
    public function deleteObject()
    {
        try {
            $this->client->deleteBlob($this->container, $this->name);

            return true;
        }catch ( \Exception $e){
            var_dump($e->getMessage());
            return false;
        }
    }

    /**
     * @return bool
     */
    public function deleteFolder()
    {
        try{
            $this->client->deleteContainer($this->container);
            return true;
        }catch ( \Exception $e){
            var_dump($e->getMessage());
            return false;
        }
    }

    public function getClient()
    {
        return $this->client;
    }

    public function createFolder(string $foldername)
    {

    }
}