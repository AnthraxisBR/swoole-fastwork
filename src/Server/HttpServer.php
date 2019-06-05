<?php


namespace AnthraxisBR\SwooleFW\Server;


use AnthraxisBR\SwooleFW\Application;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\Server\ConfigObjects\WorkersConfig;
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

    public $task_ipc_mode;

    public $message_queue_key;

    public $task_tmpdir;

    public function __construct(Application $app, array $config)
    {
        $this->host = $config['host'];
        $this->port = $config['port'];

        $this->app = $app;

        parent::__construct($this->host, $this->port);

        $this->on('start', function ($server) {
            echo "Swoole http server is started at http://" . $this->host . ":" . $this->port ."\n";
        });


        $this->onRequest();
    }

    public function onRequest()
    {
        $this->on("request", function ($request, $response) use (&$app){

            $response = $this->app->appendConfig(
                $this,
                new Request($request),
                new \AnthraxisBR\SwooleFW\http\Response($response)
            )->run();

            $response->swoole()->end($response->getResponse());
        });
    }

    public function implements_config($config)
    {
        $this->config = $config;
        if($this->hasWorkerEnabled()){
            $workerConfig = new WorkersConfig();

            $this->worker_num = $workerConfig->getWorkerNum();
            $this->task_worker_num = $workerConfig->getTaskWorkerNum();
            $this->task_ipc_mode = $workerConfig->getTaskIpcMode();
            $this->message_queue_key = $workerConfig->getMessageQueueKey();
            $this->task_tmpdir = $workerConfig->getTaskTmpdir();

            $workers_config = [];
            $workers_config['worker_num'] = $this->worker_num;
            $workers_config['task_worker_num'] = $this->task_worker_num;

            if(!is_null($this->task_ipc_mode)){
                $workers_config['task_ipc_mode'] = $this->task_ipc_mode;
            }
            if(!is_null($this->message_queue_key)){
                $workers_config['message_queue_key'] = $this->message_queue_key;
            }
            if(!is_null($this->task_tmpdir)){
                $workers_config['task_tmpdir'] = $this->task_tmpdir;
            }
            $this->set($workers_config);


            $this->on('Task', function (\swoole_server $serv, $task_id, $from_id, $data) {
                echo "#{$serv->worker_id}\tonTask: [PID={$serv->worker_pid}]: task_id=$task_id, data_len=".strlen($data).".".PHP_EOL;
                $this->app->runSignedTask($serv, $task_id, $from_id, $data);
                $serv->finish($this->app->taskResponse);
                echo 'concluído';
            });

            $this->on('workerStart', function(\swoole_server $serv, $worker_id) {
                global $argv;
                if ($serv->taskworker)
                {
                    \swoole_set_process_name("php {$argv[0]}: task_worker");
                }
                else
                {
                    \swoole_set_process_name("php {$argv[0]}: worker");
                }
            });
            $this->on('workerStop', function (\swoole_server $serv, $id) {
                echo "stop\n";
                var_dump($id);
            });
        }
    }

    private function hasWorkerEnabled()
    {
        return isset($this->config['worker']);
    }

}