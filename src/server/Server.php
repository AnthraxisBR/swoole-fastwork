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

    /**
     *
     */
    public function run() :void
    {
        /**
         * $config is one of Swoole server class
         */
        foreach ($this->getConfig() as $config){
            $config->implements_config($this->extra_config());
            $config->start();
        }
    }

    /**
     * @param Application $app
     */
    public function config(Application $app): void
    {
        $this->setConfig(ServerYamlReader::getConfig($app));
    }

    /**
     * @return array
     */
    public function extra_config() : array
    {
        return (array) ServerYamlReader::getExtraConfig();
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config) : void
    {
        $this->config = (array) $config;
    }

    /**
     * @return array
     */
    public function getConfig() : array
    {
        return (array) $this->config;
    }
}