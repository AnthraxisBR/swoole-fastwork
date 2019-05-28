<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use database\graphql\Users\Users as UsersGraphQL;
use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\graphql\GraphQL;
use AnthraxisBR\SwooleFW\http\Request;
use AnthraxisBR\SwooleFW\tasks\TasksManager;

class TasksAction extends Actions
{

    public function create(TasksManager $TasksManager, Request $request)
    {
        $TasksManager->signature('Users@insertUser');
        return $TasksManager->startTask($request->getData(),$request->getHeaders(),$request->getServerJson());
    }

}