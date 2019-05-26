<?php

namespace AnthraxisBR\SwooleFW\auth;

use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\traits\Injection;

class Authentication
{

    use Injection;

    public static $injection_reference = 'auth';

    public $headers;

    public $auth_type;

    public $action_name;

    public $routes;

    public $name;

    public $application;

    public $request;

    public function __construct($router, $routes)
    {
        $this->name = 'auth';

        $this->application = $router->application;

        $this->action_name = get_class($router->application);
        $exp = explode('\\',$this->action_name);
        $this->action_name = $exp[count($exp) - 1];

        $this->routes = $routes;

        $this->build($router->wrapper->request);

    }

    public function boot()
    {
        if(count($this->request->getHeader('Authorization')) > 1){

        }
    }

    public function build(Request $request)
    {
        $this->parseRequest($request);

        if(in_array($this->action_name, $this->routes)){
            $this->boot();
        }
    }

    public function parseRequest(Request $request)
    {
        $this->request = $request;
    }
}