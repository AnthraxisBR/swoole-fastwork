<?php


namespace AnthraxisBR\SwooleFW\CloudServices;

use Symfony\Component\Yaml\Yaml;


class CloudServicesYamlReader
{

    public $routes = [];

    private static $yaml_file;
    public $route;
    public $action;
    public $methods;
    public $args;

    public function __construct()
    {
        $config = getenv('root_folder') . 'config/cloud-services.yaml';
        //$this->yaml_file = Yaml::parseFile($config);

    }

    public static  function getAWS()
    {
        $config = getenv('root_folder') . 'config/cloud-services.yaml';
        self::$yaml_file = Yaml::parseFile($config);
        return self::$yaml_file['aws'];
    }

    public static  function getAzure()
    {
        $config = getenv('root_folder') . 'config/cloud-services.yaml';
        self::$yaml_file = Yaml::parseFile($config);
        return self::$yaml_file['azure'];
    }

}