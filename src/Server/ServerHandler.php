<?php

namespace AnthraxisBR\FastWork\Server;

use AnthraxisBR\FastWork\Application;
use Symfony\Component\Yaml\Yaml;

/**
 * Class ServerHandler
 * @package AnthraxisBR\FastWork\Server
 */
class ServerHandler
{

    /**
     * @var array
     */
    public static $yaml_file = [];

    /**
     * @var array
     */
    public static $instances = [];

    /**
     * @return array|mixed
     */
    public static function getExtraConfig() : array
    {
        self::$yaml_file = Yaml::parseFile(self::readServerYamlFile());
        unset(self::$yaml_file['server']);
        return self::$yaml_file;
    }

    /**
     * @return mixed
     */
    public static function getConfigs() : array
    {
        return Yaml::parseFile(self::readServerYamlFile());
    }

    /**
     * @param Application $app
     * @return array
     */
    public static function getConfig(Application $app) : array
    {
        self::$yaml_file = Yaml::parseFile(self::readServerYamlFile());
        return self::getServerInstances($app);
    }

    /**
     * @param Application $app
     * @return array
     */
    public static function getServerInstances(Application $app) : array
    {

        self::identityServerRequestType();

        /** Iterating over defined server, and instance class */
        foreach (self::$yaml_file['server'] as $server => $item) {
            $str_class = '\AnthraxisBR\FastWork\Server\\' . ucfirst($server) . 'Server';
            self::$instances[] = new $str_class($app, $item);
        }

        return self::$instances;
    }

    /**
     * Check server config file if has an YAML or YML
     * @return string
     */
    private static function readServerYamlFile() : string
    {
        /** @var $server_yaml_config_file string */
        $server_yaml_config_file = getenv('root_folder') . 'config/server.yaml';
        if(file_exists($server_yaml_config_file)){
            return $server_yaml_config_file;
        }else{
            $server_yaml_config_file = getenv('root_folder') . 'config/server.yml';
            return $server_yaml_config_file;
        }
    }

    /**
     * Check if request is started from start.php or index.php
     *  if index.php:
     *      Start Http Server, Doesn't allow swoole functions
     *  if start.php
     *     Start Swoole Server, allow all resources exception fastwork-asynx-ext
     */
    private static function identityServerRequestType() : void
    {
        if($_SERVER['SCRIPT_NAME'] == 'start.php'){
            unset(self::$yaml_file['server']['http']);
        }else {
            unset(self::$yaml_file['server']['swoole']);
        }
    }


}