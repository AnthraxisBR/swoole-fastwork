<?php


namespace GabrielMourao\SwooleFW\server;


use GabrielMourao\SwooleFW\Application;
use GabrielMourao\SwooleFW\http\Request;
use GabrielMourao\SwooleFW\http\Response;

class HttpServer extends \swoole_http_server
{

    public $host;

    public $port;

    public function __construct(Application $app, array $config)
    {
        $this->host = $config['host'];
        $this->port = $config['port'];

        parent::__construct($this->host, $this->port);


        $this->on('start', function ($server) {
            echo "Swoole http server is started at http://" . $this->host . ":" . $this->port ."\n";
        });

        $this->on("request", function ($request, $response) use (&$app){
            $response = $app->appendConfig(
                    $this,
                    new Request($request),
                    new Response($response)
            )->run();

            $response->swoole()->end($response->getBody());
        });

    }



}