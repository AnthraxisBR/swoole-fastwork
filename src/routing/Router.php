<?php

namespace AnthraxisBR\SwooleFW\routing;


use AnthraxisBR\SwooleFW\database\Entitites;
use AnthraxisBR\SwooleFW\graphql\GraphQL;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\providers\Providers;
use AnthraxisBR\SwooleFW\graphql\GraphQLYamlReader;
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

    public $application;

    public $response;

    public $parameters;

    private $attr_setted = [];

    private $graphql_routes = [];

    public $providers = [];

    private $hasGraphQL = false;

    private $query;

    /**
     * @var Wrapper
     */
    public $wrapper;

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
        $call_string = $namespace . $this->route->action . 'Action';
        var_dump($call_string);

        $invokable_function = $call_string . '@' . $this->route->function;
        $invokable_function = str_replace('()','',$invokable_function);

        $function = $this->route->function;

        $this->parameters = $this->getParametersFromInvokableClassFunction($invokable_function);

        $this->application = new $call_string();

        foreach ($this->parameters as $param){
                $ref = $param->getClass()->name::getInjectReference();
            if(isset($this->application->providers['entity'])){
                $this->application->appendProvider($this->providers['action_providers'][$ref]->getInstance($route = $this, $swoole_request = $this->wrapper->getRequest(), $entity = $this->application->providers['entity']));
            }else{
                $this->application->appendProvider($this->providers['action_providers'][$ref]->getInstance($route = $this, $swoole_request = $this->wrapper->getRequest()));
            }
        }

        foreach ($this->providers['fixed_providers'] as $provider){
            $this->application->appendFixedProvider($provider->getInstance($route = $this, $swoole_request = $this->wrapper->getRequest(), null, true));
        }
        $fixed_providers = $this->application->providers['fixed'];
        unset($this->application->providers['fixed']);

        $this->providers = $this->application->providers;

        unset($this->application->providers);

        $this->application->providers = $fixed_providers;
        $this->response = call_user_func_array([$this->application,$function],$this->providers);
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