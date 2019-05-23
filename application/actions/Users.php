<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use database\graphql\Users\Users as UsersGraphQL;
use GabrielMourao\SwooleFW\actions\Actions;
use GabrielMourao\SwooleFW\http\Request;

class Users extends Actions
{

    public function index(UsersEntity $UsersEntity)
    {
        if(is_null($UsersEntity->graphql)){

            return $UsersEntity->all();
        }else{
            return $UsersEntity->graphql->output;
        }
    }

    public function get_user(UsersEntity $UsersEntity, int $id )
    {
        return $UsersEntity->unique($primaryKey= $id);
    }

    public function find(UsersGraphQL $UsersGraphQL)
    {
        return $UsersGraphQL->output;
    }

    public function store(UsersEntity $UsersEntity, Request $Request)
    {
        return $UsersEntity->create($Request->getData());
    }

    public function getResponse()
    {
        return $this->response;
    }
}