<?php

namespace App\actions;

use AnthraxisBR\FastWork\CloudServices\CloudServices;
use AnthraxisBR\FastWork\actions\Actions;
use AnthraxisBR\FastWork\http\Request;
use AnthraxisBR\FastWork\tasks\TasksManager;

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