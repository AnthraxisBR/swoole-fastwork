<?php

namespace AnthraxisBR\SwooleFW\providers;

use Symfony\Component\Yaml\Yaml;

class Providers
{

    public $providers = [];

    public $routes;

    public $yaml_file = [];

    private $dev_mode = false;

    public function __construct($routes)
    {
        $this->routes = $routes;
        $config = getenv('root_folder') . 'config/providers.yaml';
        $this->yaml_file = Yaml::parseFile($config);
        $this->setEnv();
        $this->setProviders();
        $this->provide();
    }

    public function getInstance()
    {
        $obj = $this->object_reference;
        return new $obj();
    }
    
    private function provide()
    {
        foreach ($this->providers as $provider => $class) {

        }
    }


    public function getProviders()
    {
        return $this->providers;
    }
    
    private function setProviders()
    {
        foreach ( $this->yaml_file as $providers => $configs) {

            if($providers == 'action_providers'){
                if(isset($this->providers['action_providers'])){
                    $this->providers['action_providers'] = [];
                }
                foreach ($configs as $provider_name => $config) {
                    if(!isset($this->providers[$provider_name])){
                        $config = '\\' . $configs[$provider_name];
                        $this->providers['action_providers'][$provider_name] = new $config();
                    }
                }
            }
            if($providers == 'fixed_providers'){
                if(isset($this->providers['fixed_providers'])){
                    $this->providers['fixed_providers'] = [];
                }
                foreach ($configs as $provider_name => $config) {
                    if(!isset($this->providers[$provider_name])){
                        $config = '\\' . $configs[$provider_name]['provider'];
                        $this->providers['fixed_providers'][$provider_name] = new $config();
                        $this->providers['fixed_providers'][$provider_name]->routes = $configs[$provider_name]['routes'];
                    }
                }
            }
        }

    }


    private function setEnv() : void
    {
        $this->dev_mode = getenv('env') == 'Development' ? true : false;
    }
}