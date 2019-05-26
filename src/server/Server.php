<?php

namespace AnthraxisBR\SwooleFW\server;

use AnthraxisBR\SwooleFW\Application;
use AnthraxisBR\SwooleFW\server\ServerYamlReader;

class Server
{

    public $config;

    public function __construct(Application $app)
    {

        $this->config($app);

        $this->run();
    }

    public function run()
    {
        /**
         * $config is one of Swoole server class
         */
        foreach ($this->getConfig() as $config){
            $config->implements_config($this->extra_config());
            $config->start();
        }
    }

    public function config(Application $app)
    {
        $this->setConfig(ServerYamlReader::getConfig($app));
    }

    public function extra_config()
    {
        return ServerYamlReader::getExtraConfig();
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }
}