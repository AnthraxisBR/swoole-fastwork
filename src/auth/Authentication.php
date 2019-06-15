<?php

namespace AnthraxisBR\FastWork\auth;

use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Routing\Router;
use AnthraxisBR\FastWork\traits\Injection;

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

    public function __construct(Router $router, array $routes)
    {
        $this->name = 'auth';
/*]]
        $this->application = $router->application;

        $this->action_name = get_class($router->application);
        $exp = explode('\\',$this->action_name);
        $this->action_name = $exp[count($exp) - 1];

        $this->routes = $routes;*/

        $this->build($router->getRequest());

    }

    public function boot()
    {
        if(count($this->request->getHeader('Authorization')) > 1){

        }
    }

    public function build($request)
    {
        $this->parseRequest($request);
        if(in_array($this->action_name, $this->routes)){
            $this->boot();
        }
    }

    public function parseRequest($request)
    {
        $this->request = $request;
    }
}