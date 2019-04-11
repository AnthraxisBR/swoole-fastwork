<?php


namespace GabrielMourao\SwooleFW\routing;

use Symfony\Component\Yaml\Yaml;


class RoutesYamlReader
{

    public $routes = [];

    public function __construct()
    {
        $config = getenv('root_folder') . 'config/routes.yaml';
        $this->yaml_file = Yaml::parseFile($config);
        $this->setEnv();
        $this->setRoutes();
    }

    public function getRoutes() : array
    {
        return $this->routes;
    }


    private function setRoutes() : void
    {
        foreach ( $this->yaml_file as $route => $configs) {
            if($route == 'routes'){
                foreach ($configs as $config_name => $config) {
                    if($config_name == 'prefix'){
                        if(!isset($this->routes[$config_name])){
                            foreach ($configs[$config] as $route => $action) {
                                $this->routes['/' . $config . '/' . $route] = $action['action'];

                            }
                        }
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