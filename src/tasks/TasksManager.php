<?php

namespace AnthraxisBR\FastWork\tasks;



use AnthraxisBR\FastWork\CloudServices\CloudService;
use AnthraxisBR\FastWork\Routing\Router;
use AnthraxisBR\FastWork\traits\Injection;

class TasksManager
{
    use Injection;

    public static $injection_reference = 'tasks';

    public $server;

    public $response;

    public $signature;

    /**
     * TasksManager constructor.
     * @param Router|null $router
     */
    public function __construct(Router $router = null)
    {
        $this->server = $router->server;
    }

    public function signature($signature)
    {
        $this->signature = $signature;
    }

    public function startCloudServiceTask(CloudService $service)
    {

    }

    public function asyncFunction()
    {

        \Swoole\Async::dnsLookup("localhost", function ($domainName, $ip) {
            sleep(1);
            echo 1;
            sleep(2);
            echo 2;
            sleep(3);
            echo 3;
        });
    }
    public function asyncCall($class, $function, $args, $callback)
    {

        \Swoole\Async::dnsLookup("localhost", function ($domainName, $ip) {
            sleep(1);
            echo 1;
            sleep(2);
            echo 2;
            sleep(3);
            echo 3;
        });
    }
    public function startTask($data, $headers = [], $server = [])
    {
        $response = '';
        global $task_id;

        $pack = [
            'signature' => $this->signature,
            'data' => $data,
            'headers' => $headers,
            'server' => $server
        ];

        try {
            $this->server->task($pack, -1, function ($serv, $task_id, $data) use( &$response)
            {

                $response .= $task_id;
            });
            return json_encode([
                'message' => 'Tarefa iniciada com sucesso',
                'data' => [
                    'task_id' => $response
                ]
            ]);
        }catch (\Exception $e){

            return json_encode([
                'message' => 'Não foi possível iniciar a tarefa'
            ]);
        }

    }
}