<?php


namespace AnthraxisBR\SwooleFW\server;


use AnthraxisBR\SwooleFW\Application;
use AnthraxisBR\SwooleFW\http\Request;
use GabrielMourao\SwooleFW\http\Response;

class HttpServer extends \swoole_http_server
{

    public $host;

    public $port;

    public $config;

    public $worker;

    public $worker_num;

    public $task_worker_num;

    public $app;

    public function __construct(Application $app, array $config)
    {
        $this->host = $config['host'];
        $this->port = $config['port'];

        $this->app = $app;

        parent::__construct($this->host, $this->port);

        $this->on('start', function ($server) {
            echo "Swoole http server is started at http://" . $this->host . ":" . $this->port ."\n";
        });

        $this->on("request", function ($request, $response) use (&$app){
            $response = $app->appendConfig(
                    $this,
                    new Request($request),
                    new \AnthraxisBR\SwooleFW\http\Response($response)
            )->run();

            $response->swoole()->end($response->getBody());
        });

    }

    public function implements_config($config)
    {
        $this->config = $config;
        if($this->hasWorkerEnabled()){
            $this->worker_num = isset($this->config['worker']['worker_num']) ? $this->config['worker']['worker_num'] : 1;
            $this->task_worker_num = isset($this->config['worker']['task_worker_num']) ? $this->config['worker']['task_worker_num'] : 1;

            $this->set([
                'worker_num' => 1,
                'task_worker_num' => 1,
                //'task_ipc_mode' => 3,
                //'message_queue_key' => 0x70001001,
                //'task_tmpdir' => '/data/task/',
            ]);


            $this->on('Task', function (\swoole_server $serv, $task_id, $from_id, $data) {
                echo "#{$serv->worker_id}\tonTask: [PID={$serv->worker_pid}]: task_id=$task_id, data_len=".strlen($data).".".PHP_EOL;
                $this->app->runSignedTask($serv, $task_id, $from_id, $data);
                $serv->finish($this->app->taskResponse);
                echo 'concluído';
            });
        }
    }

    private function hasWorkerEnabled()
    {
        return isset($this->config['worker']);
    }

}