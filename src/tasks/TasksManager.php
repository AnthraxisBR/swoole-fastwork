<?php

namespace AnthraxisBR\SwooleFW\tasks;



use AnthraxisBR\SwooleFW\CloudServices\CloudService;
use AnthraxisBR\SwooleFW\traits\Injection;

class TasksManager
{
    use Injection;

    public static $injection_reference = 'tasks';

    public $server;

    public $response;

    public $signature;

    public function __construct($server)
    {
        $this->server = $server;
    }

    public function signature($signature)
    {
        $this->signature = $signature;
    }

    public function startCloudServiceTask(CloudService $service)
    {

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
            $this->server->task(json_encode($pack), -1, function ($serv, $task_id, $data) use( &$response)
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