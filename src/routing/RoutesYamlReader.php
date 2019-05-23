<?php


namespace GabrielMourao\SwooleFW\routing;

use Symfony\Component\Yaml\Yaml;


class RoutesYamlReader
{

    public $routes = [];

    private $yaml_file;
    public $route;
    public $action;
    public $methods;
    public $args;

    public function __construct()
    {
        $config = getenv('root_folder') . 'config/routes.yaml';
        $this->yaml_file = Yaml::parseFile($config);
        $this->setEnv();
        //$this->setRoutes();
    }

    public function getRoute($uri_arr)
    {
        if(count($uri_arr) > 1){
            $prefix = $uri_arr[0];
            unset($uri_arr[0]);
            $uri_arr = array_values($uri_arr);

            $prefixed_s = $this->yaml_file['routes'][$prefix];

            if(count($uri_arr) > 1){
                $base = $uri_arr[0];

                unset($uri_arr[0]);
                $uri_arr = array_values($uri_arr);

                if(count($uri_arr) == 1){
                    $arg = $uri_arr[0];

                }else{

                }
            }else{
                if(count($uri_arr) == 1){
                    $this->route = $uri_arr[0];
                    $this->action = $prefixed_s[$this->route]['action'];
                    $this->methods = $prefixed_s[$this->route]['methods'];
                    $this->args = [];
                }
            }
        }

        return [
            'route' => $this->route,
            'action' => $this->action,
            'methods' => $this->methods,
            'args' => $this->args
        ];
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
                                $this->routes['/' . $config . '/' . $route] = $action;
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