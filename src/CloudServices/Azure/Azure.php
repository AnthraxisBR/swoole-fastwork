<?php


namespace AnthraxisBR\SwooleFW\CloudServices\Azure;


use AnthraxisBR\SwooleFW\CloudServices\CloudServicesYamlReader;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class Azure
{

    private $connectionString;

    public $blob_client;

    public function __construct()
    {
        $config = CloudServicesYamlReader::getAzure();

        $this->connectionString = "DefaultEndpointsProtocol=https;AccountName=".$config['account_name'].";AccountKey=".$config['account_key'];

        $this->blob_client = $this->getConnectionService();
    }

    public function getConnectionService()
    {
        return BlobRestProxy::createBlobService($this->connectionString);;
    }

}