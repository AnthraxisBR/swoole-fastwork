<?php

namespace GabrielMourao\SwooleFW\routing;


use GabrielMourao\SwooleFW\database\Entitites;
use GabrielMourao\SwooleFW\http\Request;
use GabrielMourao\SwooleFW\providers\Providers;
use GabrielMourao\SwooleFW\graphql\GraphQLYamlReader;
use Illuminate\Support\Str;
use ReflectionFunction;
use ReflectionMethod;


class Router
{

    private $request;

    private $method;

    private $uri;

    private $remote_addr;

    private $protocol;

    private $routes = [];

    private $application;

    public $response;

    private $parameters;

    private $attr_setted = [];

    private $graphql_routes = [];

    public function __construct($request)
    {
        $this->response = new \stdClass();
        $this->request = $request;
        $this->implementsRoutes();
    }

    public function implementsRoutes()
    {
        $this->method = $this->request->server['request_method'];
        $this->uri = $this->request->server['request_uri'];
        $this->remote_addr = $this->request->server['remote_addr'];
        $this->protocol = $this->request->server['server_protocol'];

        $this->setProviders();


        $RoutesYaml = new RoutesYamlReader();
        $this->routes = $RoutesYaml->getRoutes();

        $GraphQLRoutesYaml = new GraphQLYamlReader();
        $this->graphql_routes = $GraphQLRoutesYaml->getRoutes();

        $this->call();
    }

    private function setProviders()
    {
        $providers = new Providers($this);
        $this->providers = $providers->getProviders();
    }

    private function applyProviders()
    {
        $attr = $this->parameters[0]->name;

        foreach ($this->providers as $provider => $class){
            if(strpos($class[0]->getReference(),'Entities')){
                if(strpos($this->parameters[0]->name,'Entity')){
                    $providedClass = $this->parameters[0]->getClass()->name;
                    $this->attr_setted[] = new $providedClass();
                }
            }
        }
    }

    private function call() : void
    {

        //if(isset($this->routes[$this->uri])) {
        //try {
            $function = 'index';
            $namespace = '\App\actions\\';

            $uri = explode('/',$this->uri);
            $original_uri = $uri;

            $id = $uri[count($uri) - 1];
            unset($uri[count($uri) - 1]);
            /*var_dump($this->routes);
            var_dump($uri);
            var_dump(implode('/',$uri));
            var_dump($this->routes[implode('/',$uri)]);
            exit();*/

            if(isset($this->routes[implode('/', $original_uri)])){
                $route = $this->routes[implode('/',$original_uri)];
                $methods = $route['methods'];
                $function = $methods[$this->method];
            }else {
                if(isset($this->routes[implode('/', $uri)])){
                    $route = $this->routes[implode('/',$uri)];
                    if(isset($route['subroutes']) && count($route['subroutes']) > 0) {
                        $is_index = is_numeric($id);
                        $subroute = str_replace('<', '', str_replace('>', '', key($route['subroutes'])));
                        $type_index = explode(':', $subroute)[0];
                        $name_index = explode(':', $subroute)[1];

                        if ($type_index == 'int') {
                            if ($is_index) {
                                $args = [$name_index => $id];
                                $arg = str_replace($name_index,$id, $name_index);
                                $arg_c = '<' . $type_index . ':' . $name_index . '>';

                                $class = $route['subroutes'][$arg_c]['action'];
                                $function = $route['subroutes'][$arg_c]['methods'][strtoupper($this->method)];

                            }
                        }
                    }
                }
            }
            if(!isset($class)){
                $class = $this->routes[$this->uri]['action'];
            }

            $invoke = $namespace . $class;

            $invokable_function = $invoke . '@' . $function;
            $invokable_function = str_replace('()','',$invokable_function);


            $this->parameters = $this->getParametersFromInvokableClassFunction($invokable_function);
            $this->applyProviders();

            $this->application = new $invoke();

            if(!isset($arg)){
                if(strtoupper($this->method) == 'POST'){
                    $original_uri = implode('/', $original_uri);
                    $this->attr_setted[] = new Request($this->method, $original_uri, $this->request->header, $this->request->rawContent());
                }
                $this->response = call_user_func_array([$this->application,$function],$this->attr_setted);
            }else{
                $this->attr_setted[] = $arg;
                $this->response = call_user_func_array([$this->application,$function],$this->attr_setted);
            }

      /*  } catch ( \Exception $e){
            $this->response = [
                "message" => "Rota não encontrada"
            ];
        }*/

    }


    protected function getParametersFromInvokableClassFunction($invokable_function)
    {
        $exp = explode('@',$invokable_function);
        $ReflectionMethod = new ReflectionMethod($exp[0], $exp[1]);
        return $ReflectionMethod->getParameters();
    }

    public function getResponse()
    {
        return json_encode($this->response);
    }
}