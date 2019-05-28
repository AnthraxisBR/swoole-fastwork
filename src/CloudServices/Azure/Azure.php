<?php


namespace AnthraxisBR\SwooleFW\CloudServices\Azure;


use AnthraxisBR\SwooleFW\CloudServices\CloudServicesYamlReader;

class Azure
{

    public $blob_client;

    public function __construct()
    {
        $config = CloudServicesYamlReader::getAzure();

        $connectionString = "DefaultEndpointsProtocol=https;AccountName=".$config['account_name'].";AccountKey=".$config['account_key'];
        // Create blob client.
        $this->blob_client = BlobRestProxy::createBlobService($connectionString);
    }

}