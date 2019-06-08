<?php

namespace App\actions;

use AnthraxisBR\SwooleFW\CloudServices\CloudServices;
use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\tasks\TasksManager;

class TasksAction extends Actions
{

    public function createMultipleUsers(TasksManager $TasksManager, Request $request)
    {
        $TasksManager->signature('Users@createMultipleUsers');
        return $TasksManager->startTask($request->getData(),$request->getHeaders(),$request->getServerJson());
    }

    public function create(TasksManager $TasksManager, Request $request)
    {
        $TasksManager->signature('Users@insertUser');
        return $TasksManager->startTask($request->getData(),$request->getHeaders(),$request->getServerJson());
    }

    public function createS3(TasksManager $TasksManager, Request $request, CloudServices $CloudServices)
    {
        $TasksManager->signature('CloudServices@cloudServiceTask');
        return $TasksManager->startCloudServiceTask($CloudServices->willGoToTask($request));
    }

}