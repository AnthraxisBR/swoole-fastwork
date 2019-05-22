<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use GabrielMourao\SwooleFW\actions\Actions;
use GabrielMourao\SwooleFW\http\Request;


class Users extends Actions
{

    public function index(UsersEntity $UsersEntity)
    {
        return $UsersEntity->all();
    }

    public function get_user(UsersEntity $UsersEntity, int $id )
    {
        return $UsersEntity->unique($primaryKey= $id);
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