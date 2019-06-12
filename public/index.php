<?php


include "../app.php";

use AnthraxisBR\FastWork\Server\Server;

return new Server($app);

/*use Http\Client\Curl\Client;

use Http\Client\HttpClient;
use Http\Discovery\HttpClientDiscovery;

class MyClass
{
    /**
     * @var HttpClient
     *
    private $httpClient;

    /**
     * @param HttpClient|null $httpClient Client to do HTTP requests, if not set, auto discovery will be used to find a HTTP client.
     *
    public function __construct(HttpClient $httpClient = null)
    {
        $this->httpClient = $httpClient ?: HttpClientDiscovery::find();
    }
}

$c = new MyClass();

/*

use AnthraxisBR\FastWork\Http\Request;

$response = $this->app->appendConfig(
    $this,
    new Request($request),
    new \AnthraxisBR\FastWork\Http\Response($response)
)->run();

$response->get('SwooleServer')->swoole()->end($response->get('SwooleServer')->getResponse());*/