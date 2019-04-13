<?php

namespace GabrielMourao\SwooleFW\routing;


use GabrielMourao\SwooleFW\database\Entitites;
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
        var_dump($this->request->get);
        var_dump('asdasdsa');
        if(isset($this->routes[$this->uri])) {
            $function = 'index';
            $namespace = '\App\actions\\';
            $class = $this->routes[$this->uri];
            $class_exp = explode('::', $class);
            if (count($class_exp) > 1) {
                $class = $class_exp[0];
                $function = $class_exp[1];
            }
            $invoke = $namespace . $class;

            $invokable_function = $invoke . '@' . $function;
            $invokable_function = str_replace('()','',$invokable_function);


            $this->parameters = $this->getParametersFromInvokableClassFunction($invokable_function);
            $this->applyProviders();

            $this->application = new $invoke();


            $this->response = call_user_func_array([$this->application,$function],$this->attr_setted);

        }

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