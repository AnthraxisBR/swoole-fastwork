<?php


namespace AnthraxisBR\SwooleFW\server;


use AnthraxisBR\SwooleFW\Application;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\http\Response;

class TasksServer extends \swoole_server
{

    public $host;

    public $port;

    public $def = SWOOLE_BASE;

    public function __construct()
    {
    }

    public function getTask()
    {
        $this->on('Receive', function(\swoole_server $serv, $fd, $from_id, $data) {
            echo 'asdasdsad';
        });
    }

    public function build()
    {



/*
        $this->on('Task', function (\swoole_server $serv, $task_id, $from_id, $data) {
            echo "#{$serv->worker_id}\tonTask: [PID={$serv->worker_pid}]: task_id=$task_id, data_len=".strlen($data).".".PHP_EOL;
            $serv->finish($data);
        });
        $this->on('Finish', function (\swoole_server $serv, $task_id, $data) {
            echo "Task#$task_id finished, data_len=".strlen($data).PHP_EOL;
        });
        $this->on('workerStart', function($serv, $worker_id) {
            global $argv;
            if($worker_id >= $serv->setting['worker_num']) {
                swoole_set_process_name("php {$argv[0]}: task_worker");
            } else {
                swoole_set_process_name("php {$argv[0]}: worker");
            }
        });*/

    }
}