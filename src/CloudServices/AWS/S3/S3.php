<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\S3;


use AnthraxisBR\SwooleFW\CloudServices\CloudServicesYamlReader;
use Aws\S3\S3Client;

class S3 extends S3Client
{
    public function __construct()
    {
        parent::__construct([]);
    }

    public function getS3Config()
    {
        $config = CloudServicesYamlReader::getAWS();
        unset($config['AWS_ACCESS_KEY_ID']);
        unset($config['AWS_SECRET_ACCESS_KEY']);
        return $config;
    }

}