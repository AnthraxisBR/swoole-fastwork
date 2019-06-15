<?php

namespace AnthraxisBR\FastWork\Routing;


use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\Application;
use AnthraxisBR\FastWork\Database\Entities;
use AnthraxisBR\FastWork\Exceptions\MethodNotAllowed;
use AnthraxisBR\FastWork\GraphQL\GraphQL;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\providers\Providers;
use AnthraxisBR\FastWork\GraphQL\GraphQLYamlReader;
use AnthraxisBR\FastWork\traits\UrlTreatmentTrait;
use Illuminate\Support\Str;
use ReflectionFunction;
use ReflectionMethod;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;


/**
 * Class Router
 * @package AnthraxisBR\FastWork\Routing
 */
class Router
{
    /**
     *
     */
    use UrlTreatmentTrait;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $remote_addr;

    /**
     * @var string
     */
    private $protocol;

    /**
     * @var Actions
     */
    public $application;

    /**
     * @var \stdClass
     */
    public $response;

    /**
     * @var array
     */
    public $parameters = [];

    /**
     * @var array
     */
    public $providers = [];

    /**
     * @var string
     */
    private $query = '';

    /**
     * @var Wrapper
     */
    public $wrapper;

    /**
     * @var array
     */
    public $route = [];

    /**
     * @var string
     */
    private $invokable_function;

    /**
     * @var string
     */
    private $classname;

    /**
     * @var string
     */
    private $function;

    public $server;

    /**
     * @var Req
     */
    public $request;
    /**
     * Router constructor.
     * @param Wrapper $wrapper
     */
    public function __construct(Wrapper $wrapper)
    {


        $this->response = new \stdClass();

        $this->mountFromWrapper($wrapper);

        $this->build();
    }

    /**
     * @param Wrapper $wrapper
     */
    public function mountFromWrapper(Wrapper $wrapper) : void
    {
        $this->response = $wrapper->getResponse();
        $this->server = $wrapper->getServer();
        $this->request = $wrapper->getRequest();
    }


    /**
     *
     */
    public function build() : void
    {

        if($this->request instanceof \Symfony\Component\HttpFoundation\Request){
            $this->method = $this->request->getMethod();
            $this->uri = $this->request->getUri();
            //$this->remote_addr = $this->request->getS();
            //$this->protocol = $this->request->getRequestServerProtocol();
        }else{
            $this->method = $this->request->getRequestMethod();
            $this->uri = $this->request->getRequestUri();
            $this->remote_addr = $this->request->getRequestRemoteAddr();
            $this->protocol = $this->request->getRequestServerProtocol();
        }

        $this->setProviders();

        $this->setRunningRoute();

        $this->applyHttpMethodRules();


        $this->route = (object) $this->route;

        $this->superCall();
    }

    /**
     *
     */
    private function applyHttpMethodRules() : void
    {
        if($this->method == 'POST'){
            $this->applyHttpMethodPostRules();
        }
    }

    /**
     *
     */
    private function applyHttpMethodPostRules() : void
    {
        $this->implementsGraphqlroute();
    }

    /**
     *
     */
    private function implementsGraphqlroute() : void
    {
        if($this->hasGraphQLQueryBody()) {
            $this->query = $this->wrapper->getPostBody()->query;
            $GraphQLRoutesYaml = new GraphQLYamlReader();
            $this->route = array_merge($this->route, $GraphQLRoutesYaml->getRoute($this->route['uri']));
            $this->function = $this->route['graphql']['function'];
        }
    }

    /**
     *
     */
    private function setRunningRoute() : void
    {
        $this->prepareRouterFromFile();
        try {
            $this->route['function'] = $this->route['methods'][$this->method];
        } catch (\ErrorException $e) {

            throw new MethodNotAllowed([], $this->method);
        }
    }

    /**
     *
     */
    private function prepareRouterFromFile() : void
    {
        $uri_exp = explode('/', $this->uri);

        if(isset($uri_exp[0]) and $uri_exp[0] == ''){
            unset($uri_exp[0]);
            $uri_exp = array_values($uri_exp);
        }

        $RoutesYaml = new RoutesYamlReader();

        $this->route = $RoutesYaml->getRoute($uri_exp);
    }

    /**
     *
     */
    private function superCall() : void
    {
        $this->buildInvokableFunction();

        $this->application = new $this->classname();
        $this->runProviders();
        /**
         * Call action
         */
        $this->callActionClassFunction();
    }

    /**
     *
     */
    public function callActionClassFunction() : void
    {
        try {
            $this->application->setServer($this->server);

            $this->checkUrlParams();

            $args = array_merge($this->providers, $this->url_params);

            $this->response = call_user_func_array([$this->application,$this->function],$args);
        } catch (\Exception $e)
        {
            $this->errorResponse($e);
        }
    }

    public function checkUrlParams()
    {
        $uri = str_replace('/api','', $this->uri);
        $uri = str_replace('/','\\', $uri);

        $uri_2 = $this->route->uri;

        $exp_1 = array_values(array_filter(explode('\\',$uri),function($str){ return $str != ''; }));
        $exp_2 = array_values(array_filter(explode('\\',$uri_2),function($str){ return $str != ''; }));


        if($exp_1[0] == 'http:'){
            unset($exp_1[0]);
            unset($exp_1[1]);
            $exp_1 = array_values($exp_1);
        }

        $isset = [];

        for($i = 0; $i < count($exp_1); $i++){
            if(isset($exp_1[$i]) and isset($exp_2[$i])){

                if($exp_1[$i] == $exp_2[$i]){
                    //$i += 1;
                }else{
                    if(isset($this->url_params[$i])) {
                        if($exp_1[$i - 1] == $exp_2[$i - 1]){
                            $i -= 1;
                        }
                        $type = $this->url_params[$i]->getType()->getName();

                        if (ctype_digit($exp_1[$i + 1])) {
                            $exp_1[$i + 1] = (int)$exp_1[$i + 1];
                        }

                        $type_arg = gettype($exp_1[$i + 1]);
                        if ($type_arg == 'integer') {
                            $type_arg = 'int';
                        }
                        if ($type_arg == $type) {
                            $this->url_params[$i] = $exp_1[$i + 1];
                        }

                        if ($exp_1[$i] == $exp_2[$i]) {
                            $i += 1;
                        }
                    }
                }
            }else{
                break;
            }
        }

    }

    /**
     * @param \Exception $e
     */
    public function errorResponse(\Exception $e){
        $this->response = [ 'message' => $e->getMessage()];
    }

    /**
     *
     */
    private function runProviders() : void
    {
        /**
         * Appending providers from action function parameters
         */
        $this->url_params = [];
        $runned = [];
        $ref = '';


        foreach ($this->parameters as $key => $param){
            /**
             * Use a reference provided inside all provided classes
             */
            /** @var $param \ReflectionParameter */

            if(!is_null($param->name)){
                if(is_object($param->getClass())){
                    $ref = $param->getClass()->name::getInjectReference();
                }else{
                    $this->url_params[] = $param;
                }
            }else{
                $this->url_params[] = $param;
            }

            /**
             * Some providers cannot be used without an entity instance
             */

            if(in_array($ref,$runned)){
                continue;
            }

            $runned[] = $ref;

            if(isset($this->application->providers['entity'])){

                if(isset($this->getRequest()->swoole_request)) {
                    $this->application->appendProvided(
                        $this->providers['action_providers'][$ref]->getInstance(
                            $route = $this,
                            $swoole_request = $this->getRequest()->swoole_request,
                            $entity = $this->application->providers['entity']
                        )
                    );
                }else{

                    $this->application->appendProvided(
                        $this->providers['action_providers'][$ref]->getInstance(
                            $route = $this
                        )
                    );
                }
            }else{

                if(isset($this->getRequest()->swoole_request)){

                    $this->application->appendProvided(
                        $this->providers['action_providers'][$ref]->getInstance(
                            $route = $this,
                            $swoole_request = $this->getRequest()->swoole_request
                        )
                    );
                }else{

                    $this->application->appendProvided(
                        $this->providers['action_providers'][$ref]->getInstance(
                            $route = $this
                        )
                    );

                }
            }
        }


        /**
         * Applying fixed providers, can be mandatory
         */
        foreach ($this->fixedProviders() as $provider){
            //trigger_error('asdasdsadsad',E_USER_NOTICE);

            //trigger_error(memory_get_usage(true),3);
            $this->application->appendFixedProvided(
                $provider->getInstance(
                    $route = $this,
                    $swoole_request = $this->getRequest(),
                    null,
                    true
                )
            );
        }

        if(isset($this->application->providers['fixed'])){

            $fixed_providers = $this->application->providers['fixed'];

            unset($this->application->providers['fixed']);
        }

        $this->providers = $this->application->providers;

        unset($this->application->providers);

        if(isset($fixed_providers)){
            $this->application->providers = $fixed_providers;
        }

    }

    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return string
     */
    private function buildInvokableFunction() : void
    {

        $this->parameters = $this->getParametersFromInvokableClassFunction();

    }

    /**
     * Return all fixed providers available
     * @return array
     */
    public function fixedProviders() : array
    {
        return isset($this->providers['fixed_providers']) ? $this->providers['fixed_providers'] : [] ;
    }

    /**
     * Define providers from primary instance into router provider attribute
     */
    private function setProviders()
    {
        $this->providers = (new Providers($this))->getProviders();
    }

    /**
     * Check a request is to append graphql provider
     * @return bool
     */
    public function hasGraphQLQueryBody()
    {
        if(method_exists($this->getRequest(),'getContent')){
            return isset($this->getRequest()->getContent()->query);
        }
        return isset($this->getRequest()->getPostBody()->query);
    }

    /**
     * @param $invokable_function
     * @return \ReflectionParameter[]
     * @throws \ReflectionException
     */
    protected function getParametersFromInvokableClassFunction()
    {
        $invokable_function = $this->route->methods[$this->method];

        $exp = explode('@',$invokable_function);


        if(!strpos($invokable_function,'Resource@')) {
            $this->classname = '\App\Actions\\' . $exp[0] . 'Action';

        }else{
            $this->classname = '\App\Resources\\' . ucfirst($exp[0]);
        }
        if (is_null($this->function)) {
            if(isset($exp[1])){

                $this->function = $exp[1];
            }
        }

        $ReflectionMethod = new ReflectionMethod($this->classname, $this->function);
        return $ReflectionMethod->getParameters();
    }

    /**
     * @return false|string
     */
    public function getResponse()
    {
        return json_encode($this->response);
    }
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getRemoteAddr(): string
    {
        return $this->remote_addr;
    }

    /**
     * @param string $remote_addr
     */
    public function setRemoteAddr(string $remote_addr): void
    {
        $this->remote_addr = $remote_addr;
    }

    /**
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol(string $protocol): void
    {
        $this->protocol = $protocol;
    }

    /**
     * @return Actions
     */
    public function getApplication(): Actions
    {
        return $this->application;
    }

    /**
     * @param Actions $application
     */
    public function setApplication(Actions $application): void
    {
        $this->application = $application;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return Wrapper
     */
    public function getWrapper(): Wrapper
    {
        return $this->wrapper;
    }

    /**
     * @param Wrapper $wrapper
     */
    public function setWrapper(Wrapper $wrapper): void
    {
        $this->wrapper = $wrapper;
    }

    /**
     * @return array
     */
    public function getRoute(): array
    {
        return $this->route;
    }

    /**
     * @param array $route
     */
    public function setRoute(array $route): void
    {
        $this->route = $route;
    }

    /**
     * @return string
     */
    public function getInvokableFunction(): string
    {
        return $this->invokable_function;
    }

    /**
     * @param string $invokable_function
     */
    public function setInvokableFunction(string $invokable_function): void
    {
        $this->invokable_function = $invokable_function;
    }

    /**
     * @return string
     */
    public function getClassname(): string
    {
        return $this->classname;
    }

    /**
     * @param string $classname
     */
    public function setClassname(string $classname): void
    {
        $this->classname = $classname;
    }

    /**
     * @return string
     */
    public function getFunction(): string
    {
        return $this->function;
    }

    /**
     * @param string $function
     */
    public function setFunction(string $function): void
    {
        $this->function = $function;
    }
}