<?php


namespace AnthraxisBR\FastWork\Server;


use AnthraxisBR\FastWork\Application;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Server\ConfigObjects\WorkersConfig;
use GabrielMourao\FastWork\Http\Response;

class SwooleServer extends \swoole_http_server implements FwServerInterface
{

    public $host;

    public $port;

    public $config;

    public $workers_config;

    public $worker;

    public $worker_num;

    public $task_worker_num;

    public $app;

    public $task_ipc_mode;

    public $message_queue_key;

    public $task_tmpdir;

    public $server_config = [];

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
                new \AnthraxisBR\FastWork\Http\Response($response)
            )->run();

            $response->get('SwooleServer')->swoole()->end($response->get('SwooleServer')->getResponse());
        });
    }

    public function implements_config($config)
    {
        $this->config = $config;

        if($this->hasWorkerEnabled()){

            $this->setAllWorkersConfigs();


            $this->bindTaskEvents();
        }

        if($this->hasServerConfigs()){
            $swoole = $this->config['server']['swoole'];

            $configs = $swoole['config'];

            $this->server_config['ssl_cert_file'] = $configs['ssl_cert_file'];
            $this->server_config['ssl_key_file'] = $configs['ssl_key_file'];
            $this->server_config['poll_thread_num'] = $configs['poll_thread_num'];
            $this->server_config['max_request'] = $configs['max_request'];
            $this->server_config['max_conn'] = $configs['max_conn'];
        }


        $this->set($this->getConfigs());
    }

    public function hasServerConfigs()
    {
        return isset($this->config['server']);
    }

    public function getConfigs()
    {
        return array_merge(
            $this->getWorkersConfig(),
            $this->getServerConfig()
        );
    }

    public function getServerConfig()
    {
        return $this->server_config;
    }

    public function bindTaskEvents()
    {


        $this->onTask();

        $this->onWorkerStart();

        $this->onWorkerStop();
    }

    public function onTask()
    {

        $this->on('Task', function (\swoole_server $serv, $task_id, $from_id, $data) {
            $start = microtime(true);
            echo "#{$serv->worker_id}\tonTask: [PID={$serv->worker_pid}]: task_id=$task_id, data_len=".strlen(json_encode($data)).".".PHP_EOL;
            if(!is_int($data) and !is_null($data)){
                $this->app->runSignedTask($serv, $task_id, $from_id, $data);
                $serv->finish($this->app->taskResponse);
            }
            $serv->finish('concluido');
            echo "#Execution time: " . (microtime(true) - $start) . ' milliseconds' .PHP_EOL;
        });

    }

    public function onWorkerStart()
    {


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

    }


    public function onWorkerStop()
    {

        $this->on('workerStop', function (\swoole_server $serv, $id) {
            echo "stop\n";
            var_dump($id);
        });
    }

    public function configure($configs)
    {
        $this->implements_config($configs);
    }

    public function setAllWorkersConfigs()
    {
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

        $this->setWorkersConfig($workers_config);
    }

    public function hasWorkerEnabled()
    {
        return isset($this->config['worker']);
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host): void
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port): void
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config): void
    {
        $this->config = $config;
    }

    /**
     * @return mixed
     */
    public function getWorkersConfig()
    {
        return $this->workers_config;
    }

    /**
     * @param mixed $workers_config
     */
    public function setWorkersConfig($workers_config): void
    {
        $this->workers_config = $workers_config;
    }

    /**
     * @return mixed
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     * @param mixed $worker
     */
    public function setWorker($worker): void
    {
        $this->worker = $worker;
    }

    /**
     * @return mixed
     */
    public function getWorkerNum()
    {
        return $this->worker_num;
    }

    /**
     * @param mixed $worker_num
     */
    public function setWorkerNum($worker_num): void
    {
        $this->worker_num = $worker_num;
    }

    /**
     * @return mixed
     */
    public function getTaskWorkerNum()
    {
        return $this->task_worker_num;
    }

    /**
     * @param mixed $task_worker_num
     */
    public function setTaskWorkerNum($task_worker_num): void
    {
        $this->task_worker_num = $task_worker_num;
    }

    /**
     * @return Application
     */
    public function getApp(): Application
    {
        return $this->app;
    }

    /**
     * @param Application $app
     */
    public function setApp(Application $app): void
    {
        $this->app = $app;
    }

    /**
     * @return mixed
     */
    public function getTaskIpcMode()
    {
        return $this->task_ipc_mode;
    }

    /**
     * @param mixed $task_ipc_mode
     */
    public function setTaskIpcMode($task_ipc_mode): void
    {
        $this->task_ipc_mode = $task_ipc_mode;
    }

    /**
     * @return mixed
     */
    public function getMessageQueueKey()
    {
        return $this->message_queue_key;
    }

    /**
     * @param mixed $message_queue_key
     */
    public function setMessageQueueKey($message_queue_key): void
    {
        $this->message_queue_key = $message_queue_key;
    }

    /**
     * @return mixed
     */
    public function getTaskTmpdir()
    {
        return $this->task_tmpdir;
    }

    /**
     * @param mixed $task_tmpdir
     */
    public function setTaskTmpdir($task_tmpdir): void
    {
        $this->task_tmpdir = $task_tmpdir;
    }


}