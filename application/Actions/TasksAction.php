<?php

namespace App\Actions;

use AnthraxisBR\FastWork\CloudServices\CloudServices;
use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\Tasks\TasksManager;

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