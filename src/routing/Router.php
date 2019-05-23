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
        var_dump((object) $this->route);
        var_dump($this->providers);
        //$this->routes = $RoutesYaml->getRoutes();


        $this->superCall();
    }

    private function superCall()
    {
        $namespace = '\App\actions\\';
        $call_string = $namespace . $this->route->action;
        //if(isset($this->route->graphql)){
        //    $object_type_namespace = 'database\graphql\\' . $this->route->graphql['object'] . '\\' . $this->route->graphql['object'];
        //}

        $invokable_function = $call_string . '@' . $this->route->function;
        $invokable_function = str_replace('()','',$invokable_function);


        $this->parameters = $this->getParametersFromInvokableClassFunction($invokable_function);


        $action_instanced = new $call_string();
        foreach ($this->providers as $provider){
            //TODO fazer injeção de entity manager
            //TODO fazer injeção grphql e permitir inbjeção de provider independente
            $action_instanced = $provider::getInstance();
        }

        if(isset($this->route->graphql)){
            //TODO Verificar como fazer chamada no método da action
            $action_instanced->{$this->route->function}(new GraphQL(new $object_type_namespace()));
        }
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
            if($provider == 'entities'){
                foreach ($this->parameters as $param){
                    if(strpos($param->name,'Entity')){
                        $providedClass = $param->getClass()->name;
                        $this->attr_setted[] = new $providedClass();
                    }
                }
            }elseif($provider == 'graphql') {
                array_map(function($class_provider) use ($class){
                    if($class_provider instanceof Entitites){
                        if(isset($this->request->get['graphql'])){
                            $this->hasGraphQL = true;
                            $provided = $class[0]->getInstance($class_provider, $this->request->get['graphql']);
                            $this->attr_setted[] = $provided;
                        }
                    }
                },$this->attr_setted);
            }else{
                var_dump($provider);
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

            if($this->hasGraphQL){
                foreach ($this->attr_setted as $k => $attr){
                    if($attr instanceof GraphQL){
                        if($k != 0){
                            $this->attr_setted[0]->graphql = $this->attr_setted[$k];
                        }
                    }
                }
                //$this->attr_setted[0] = $this->
            }

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