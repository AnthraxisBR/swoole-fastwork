<?php


namespace AnthraxisBR\FastWork\Server;


use AnthraxisBR\FastWork\Application;
use AnthraxisBR\FastWork\Exceptions\MultiTaskNotAllowed;
use Psr\Http\Message\ResponseInterface;

class HttpServer implements FwServerInterface
{

    public function __construct(Application $app, array $config)
    {

        $this->app = $app;

        $this->onRequest();
    }

    public function __call($name, $arguments)
    {
        if($name == 'taskWaitMulti' and getenv('SERVER') == 'HTTP'){
            throw new MultiTaskNotAllowed('Method  ' . $name . ' not allowed with Apache or NGINX Server');
        }
    }

    public function start()
    {
    }

    public function configure($configs)
    {
        $this->implements_config($configs);
    }

    public function onRequest()
    {
        putenv('SERVER=HTTP');
        $response = $this->app->appendConfig(
            $this, new \Symfony\Component\HttpFoundation\Request(
            $_GET,
            $_POST,
            [],
            $_COOKIE,
            $_FILES,
            $_SERVER
        ),
            new \AnthraxisBR\FastWork\Http\Response()
        )->run();

        header('Content-Type: application/json');
        return $response->get('HttpServer')->end($response->get('HttpServer'));//->get('HttpServer')->getResponse());
    }


    public function implements_config($config)
    {
        // TODO: Implement implements_config() method.
    }

    public function hasServerConfigs()
    {
        // TODO: Implement hasServerConfig() method.
    }

    public function getConfigs()
    {
        // TODO: Implement getConfigs() method.
    }

    public function getServerConfig()
    {
        // TODO: Implement getServerConfig() method.
    }

    public function bindTaskEvents()
    {
        // TODO: Implement bindTaskEvents() method.
    }

    public function onTask()
    {
        // TODO: Implement onTask() method.
    }

    public function onWorkerStart()
    {
        // TODO: Implement onWorkerStart() method.
    }

    public function onWorkerStop()
    {
        // TODO: Implement onWorkerStop() method.
    }

    public function setAllWorkersConfigs()
    {
        // TODO: Implement setAllWorkersConfigs() method.
    }

    public function hasWorkerEnabled()
    {
        // TODO: Implement hasWorkerEnabled() method.
    }

    public function getHost()
    {
        // TODO: Implement getHost() method.
    }

    public function setHost($host)
    {
        // TODO: Implement setHost() method.
    }

    public function getPort()
    {
        // TODO: Implement getPort() method.
    }

    public function setPort($port)
    {
        // TODO: Implement setPort() method.
    }

    public function getConfig()
    {
        // TODO: Implement getConfig() method.
    }

    public function setConfig($config)
    {
        // TODO: Implement setConfig() method.
    }

}