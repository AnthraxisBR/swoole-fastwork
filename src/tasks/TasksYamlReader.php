<?php


namespace AnthraxisBR\SwooleFW\server;

use AnthraxisBR\SwooleFW\Application;
use Symfony\Component\Yaml\Yaml;


class TasksYamlReader
{

    public static $yaml_file = [];

    public static $instances = [];

    public static function getTasks()
    {
        try {
            $config = getenv('root_folder') . 'config/tasks.yml';
        }catch (\Exception $e){
            $config = getenv('root_folder') . 'config/tasks.yaml';
        }

        self::$yaml_file = Yaml::parseFile($config);

        $result = self::parseConfig($app);

        return $result;
    }

    public static function parseConfig(Application $app)
    {

        foreach (self::$yaml_file['server'] as $server => $item) {
            $str_class = '\AnthraxisBR\SwooleFW\server\\' . ucfirst($server) . 'Server';
            self::$instances[] = new $str_class($app, $item);
        }

        return self::$instances;
    }


}