<?php


namespace AnthraxisBR\FastWork\GraphQL;

use Symfony\Component\Yaml\Yaml;


class GraphQLYamlReader
{

    public $routes = [];

    public $yaml_file;

    public function __construct()
    {
        $config = getenv('root_folder') . 'config/graphql-routes.yaml';
        $this->yaml_file = Yaml::parseFile($config);
        $this->setEnv();
        $this->setRoutes();
    }

    public function getRoute($route)
    {
        $this->routes = $this->yaml_file['routes'];

        $rs = [];
        if( isset($this->routes[$route])){
//            unset($route['function']);
            $rs['function'] = $this->routes[$route]['function'];
            $rs['graphql'] = $this->routes[$route];
        }
        return $rs;
    }

    public function getRoutes() : array
    {
        return $this->routes;
    }


    private function setRoutes() : void
    {
        foreach ( $this->yaml_file as $route => $routes) {
            if($route == 'routes'){
                foreach ($routes as $route_name => $route) {
                    $this->routes[$route_name] = [];
                    $this->routes[$route_name]['object'] = '\Utils\GraphQL\\' . $route['object'] . '\\' . $route['object'];
                    foreach ($route['fields'] as $field){
                        $this->routes[$route_name]['fields'] = '\Utils\GraphQL\\' . $route['object'] . '\Fields\\' . $field;
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