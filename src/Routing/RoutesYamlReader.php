<?php


namespace AnthraxisBR\SwooleFW\Routing;


use AnthraxisBR\SwooleFW\Defining\Type;
use AnthraxisBR\SwooleFW\traits\UrlTreatmentTrait;
use Symfony\Component\Yaml\Yaml;
use tests\src\routes\RoutesYamlReaderTest;


/**
 * Class RoutesYamlReader
 * @package AnthraxisBR\SwooleFW\Routing
 */
class RoutesYamlReader
{

    /**
     * @var array
     */
    public $routes = [];

    /**
     * array
     * @var mixed
     */
    private $yaml_file;

    /**
     * array
     * @var
     */
    public $route;

    /**
     * string
     * @var
     */
    public $action;

    /**
     * @var array
     */
    public $methods;

    /**
     * @var array
     */
    public $args;

    /**
     * @var string
     */
    public $prefix;

    /**
     * @var string
     */
    public $uri;

    /**
     * RoutesYamlReader constructor.
     */
    public function __construct()
    {
        $config = getenv('root_folder') . 'routes/routes.php';
        include($config);
        /*var_dump($routes);
        exit();
        $this->yaml_file = Yaml::parseFile($config);*/
        $this->routes = $routes;
        $this->setEnv();
    }

    /**
     * @param $arr
     * @return mixed
     */
    public function getUriPrefix($arr)
    {
        return $arr[0];
    }

    /**
     * Function to prepare uri arr, thah uri will return uri, action and http methods
     * @param $arr
     * @param int $index
     * @param null $routes
     * @param array $mount
     * @return array
     */
    private function urisLooper($arr, $index = 0, $routes = null, $mount = [])
    {
        if(is_null($routes)){
            $routes = $this->getRouteFromPrefix();
        }

        if(!isset($arr[$index])){
            return $this->getRouteArray($routes, $mount);
        }

        foreach ($routes as $route => $config){

            /**
             * Split this part of uri
             */

            $exp_route = $this->cleanRoute($config['uri']);

            /**
             * Check iteration level
             */
            if(count($exp_route) == count($arr)){
                /**
                 * get str of this part uf uri
                 */
                $uri_arg_str = $exp_route[$index];
                /**
                 * Check if has :, if has :, is a attr $uri_agr_str
                 */
                if(strpos($uri_arg_str,':')){
                    $type = $this->getUriArgType($uri_arg_str);

                    if(Type::{$type}($arr[$index])){
                        $mount[] = $exp_route[$index];
                    }else{
                        /**
                         * TODO: iniciar criação dos excpetions e dos tratamentos
                         */
                    }
                }else{
                    if($arr[$index] == $uri_arg_str){
                        $mount[] = $exp_route[$index];
                    }
                }

            }
        }
        $index += 1;

        $this->urisLooper($arr, $index, $routes, $mount);
    }

    public function getRoute($uri_arr)
    {

        if(count($uri_arr) > 1){
            $this->prefix = $this->getUriPrefix($uri_arr);

            unset($uri_arr[0]);
            $uri_arr = array_values($uri_arr);

            $this->urisLooper($uri_arr);
        }else{
            /**
             * TODO: exceções
             */
        }

        return [
            'uri' => $this->route['uri'],
            'methods' => $this->route['methods']
        ];
    }

    /**
     * @param string $uri_arg_str
     * @return string
     */
    private function getUriArgType(string $uri_arg_str) : string
    {
        $rt_str = str_replace('<', '',str_replace('>', '',$uri_arg_str));
        $exp_rt = explode(':',$rt_str);
        $type = $exp_rt[0];
        return (string) $type;
    }

    /**
     * @return array
     */
    public function getRoutes() : array
    {
        return (array) $this->routes;
    }

    /**
     * @param string $route
     * @return array
     */
    private function cleanRoute(string $route) : array
    {
        $exp_route = explode('\\', $route);
        $exp_route = array_filter($exp_route, function($it){
            return $it != '';
        });
        $exp_route = array_values($exp_route);
        return (array) $exp_route;
    }

    /**
     * @return array
     */
    private function getRouteFromPrefix() : array
    {
        return (array) $this->routes[$this->prefix];
    }

    /**
     * @param string $mount
     * @return string
     */
    private function mountUriBaseFromArray(array $mount) : string
    {
        return (string) '\\' . implode('\\', $mount);
    }


    private function setEnv() : void
    {
        $this->dev_mode = getenv('env') == 'Development' ? true : false;
    }

    /**
     * @param array $routes
     * @param array $mount
     * @return array
     */
    private function getRouteArray(array $routes, array $mount) : array
    {

        $str = $this->mountUriBaseFromArray($mount);

        //$routes[$str]['uri'] = $str;

        foreach ($routes as $route){
            if($route['uri'] == $str){
                $this->route = $route;
            }
        }

        return (array) $routes;
    }


}