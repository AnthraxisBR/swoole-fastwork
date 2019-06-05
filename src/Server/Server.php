<?php

namespace AnthraxisBR\SwooleFW\Server;

use AnthraxisBR\SwooleFW\Application;
use AnthraxisBR\SwooleFW\Server\ServerYamlReader;

/**
 * Class Server
 * @package AnthraxisBR\SwooleFW\server
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
        $this->configure($app);

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
        foreach ($this->getConfig() as $config){
            $config->implements_config($this->extra_config());
            $config->start();
        }
    }

    /**
     * Defines server application config from file
     * @param Application $app
     */
    public function configure(Application $app): void
    {
        $this->setConfig(ServerYamlReader::getConfig($app));
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