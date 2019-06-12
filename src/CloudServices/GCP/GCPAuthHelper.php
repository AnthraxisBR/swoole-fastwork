<?php


namespace AnthraxisBR\FastWork\CloudServices\GCP;


use Symfony\Component\Yaml\Yaml;

class GCPAuthHelper
{

    public static function getGoogleCredentialsFile()
    {
        $config = getenv('root_folder') . 'config/cloud-services.yaml';
        self::$yaml_file = Yaml::parseFile($config);
        return self::$yaml_file['google']['credentials_file'];
    }
}