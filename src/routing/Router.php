<?php

namespace GabrielMourao\SwooleFW\routing;


use GabrielMourao\SwooleFW\database\Entitites;
use GabrielMourao\SwooleFW\graphql\GraphQL;
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

    public $providers = [];

    private $hasGraphQL = false;

    private $query;

    /**
     * @var Wrapper
     */
    private $wrapper;

    public $route = [];

    public function __construct(Wrapper $wrapper)
    {
        $this->response = new \stdClass();
        $this->wrapper = $wrapper;


        $this->implementsRoutes();
    }

    public function implementsRoutes()
    {
        $this->method = $this->wrapper->getRequestMethod();
        $this->uri = $this->wrapper->getRequestUri();
        $this->remote_addr = $this->wrapper->getRequestRemoteAddr();
        $this->protocol = $this->wrapper->getRequestServerProtocol();

        $this->setProviders();

        $uri_exp = explode('/', $this->uri);

        if(isset($uri_exp[0]) and $uri_exp[0] == ''){
            unset($uri_exp[0]);
            $uri_exp = array_values($uri_exp);
        }

        $RoutesYaml = new RoutesYamlReader();
        $this->route = $RoutesYaml->getRoute($uri_exp);

        $this->route['function'] = $this->route['methods'][$this->method];

        if($this->method == 'POST'){
            if($this->hasGraphQLQueryBody()){
                $this->query = $this->wrapper->getPostBody()->query;
                $GraphQLRoutesYaml = new GraphQLYamlReader();
                $this->route = $GraphQLRoutesYaml->getRoute($this->route);
            }
        }
        $this->route = (object) $this->route;

        $this->superCall();
    }

    private function superCall()
    {
        $namespace = '\App\actions\\';
        $call_string = $namespace . $this->route->action;

        $invokable_function = $call_string . '@' . $this->route->function;
        $invokable_function = str_replace('()','',$invokable_function);

        $function = $this->route->function;

        $this->parameters = $this->getParametersFromInvokableClassFunction($invokable_function);

        $this->application = new $call_string();

        foreach ($this->parameters as $param){
            $ref = $param->getClass()->name::getInjectReference();
            $this->application->appendProvider($this->providers[$ref]->getInstance($this->parameters, $this->wrapper->getRequest()));
        }

        $this->providers = $this->application->providers;
        unset($this->application->providers);

        if(!isset($arg)){
            $this->response = call_user_func_array([$this->application,$function],$this->providers);
        }else{
            $this->attr_setted[] = $this->application->providers;
            $this->response = call_user_func_array([$this->application,$function],$this->attr_setted);
        }
    }

    private function setProviders()
    {
        $providers = new Providers($this);
        $this->providers = $providers->getProviders();
    }

    public function hasGraphQLQueryBody()
    {
        return isset($this->wrapper->getPostBody()->query);
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