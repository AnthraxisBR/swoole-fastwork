<?php

namespace AnthraxisBR\FastWork\Server;

use AnthraxisBR\FastWork\Application;
use AnthraxisBR\FastWork\Server\ServerYamlReader;

/**
 * Class Server
 * @package AnthraxisBR\FastWork\server
 */
class Server
{

    /**
     * @var array
     */
    public $config = [];

    /**
     * Server constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->prepare($app);

        $this->run();
    }

    /**
     * Runs servers
     */
    public function run() :void
    {
        /**
         * $config is one of Swoole server class
         */
        foreach ($this->getApplication() as $application){
            /* @var $config SwooleServer */
            $application->configure(array_merge($this->getConfig(),$this->extra_config()));
            $application->start();

        }
    }

    /**
     * Defines server application config from file
     * @param Application $app
     */
    public function prepare(Application $app): void
    {
        var_dump('asd');
        $this->setApplication(ServerYamlReader::getConfig($app));
        $this->setConfig(ServerYamlReader::getConfigs($app));
    }

    public function setApplication($application)
    {
        $this->application = $application;
    }
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Get extra attr configs from file .yaml
     * Extra config is any config value that doesnt belongs to server class
     * @return array
     */
    public function extra_config() : array
    {
        return (array) ServerYamlReader::getExtraConfig();
    }

    /**
     * Defines array of configs of server instance class
     * @param array $config
     */
    public function setConfig(array $config) : void
    {
        $this->config = (array) $config;
    }

    /**
     * Returns array of configs in server instance class
     * @return array
     */
    public function getConfig() : array
    {
        return (array) $this->config;
    }
}