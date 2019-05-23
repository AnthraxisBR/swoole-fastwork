<?php


namespace GabrielMourao\SwooleFW;


use GabrielMourao\SwooleFW\http\Request;
use GabrielMourao\SwooleFW\routing\Wrapper;

class Application
{

    public $request;

    public $response;

    public $servers = [];

    private $protocol;

    public function __construct()
    {

    }

    public function appendConfig($server, Request $request, $response)
    {
        $server_exp = explode('\\',get_class($server));
        $server_key = $server_exp[count($server_exp ) - 1];

        $this->setProtocol($protocol = $request->swoole_request->server['server_protocol']);

        $this->servers[$server_key] = new Wrapper($request, $response);

        return $this;
    }


    public function run()
    {
        if($this->isHttpProtocol()){
            $this->servers['HttpServer']->process();
        }
    }

    public function setProtocol(string $protocol = '') : void
    {
        $this->protocol = $protocol;
    }

    public function isHttpProtocol() : bool
    {
        return explode('/', $this->protocol)[0] == 'HTTP';
    }

}