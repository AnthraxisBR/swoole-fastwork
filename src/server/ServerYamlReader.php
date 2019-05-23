<?php


namespace GabrielMourao\SwooleFW\server;

use GabrielMourao\SwooleFW\Application;
use Symfony\Component\Yaml\Yaml;


class ServerYamlReader
{

    public static $yaml_file = [];

    public static $instances = [];

    public static function getConfig(Application $app)
    {
        try {
            $config = getenv('root_folder') . 'config/server.yml';
        }catch (\Exception $e){
            $config = getenv('root_folder') . 'config/server.yaml';
        }

        self::$yaml_file = Yaml::parseFile($config);

        $result = self::parseConfig($app);

        return $result;
    }

    public static function parseConfig(Application $app)
    {

        foreach (self::$yaml_file['server'] as $server => $item) {
            $str_class = '\GabrielMourao\SwooleFW\server\\' . ucfirst($server) . 'Server';
            self::$instances[] = new $str_class($app, $item);
        }

        return self::$instances;
    }


}