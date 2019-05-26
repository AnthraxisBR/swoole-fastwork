<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use database\graphql\Users\Users as UsersGraphQL;
use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\graphql\GraphQL;
use AnthraxisBR\SwooleFW\http\Request;

class Users extends Actions
{

    public function graphql(UsersEntity $UsersEntity, UsersGraphQL $UsersGraphQL)
    {
        return $UsersGraphQL->output;
    }

    public function index(UsersEntity $UsersEntity)
    {
        return $UsersEntity->all();
    }

    public function get_user(UsersEntity $UsersEntity, int $id )
    {
        return $UsersEntity->unique($primaryKey= $id);
    }

    public function find(UsersGraphQL $UsersGraphQL)
    {
        return $UsersGraphQL->output;
    }

    public function store(Request $request, UsersEntity $UsersEntity)
    {
        return $UsersEntity->create($request->getData());
    }

    public function getResponse()
    {
        return $this->response;
    }
}