<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use GabrielMourao\SwooleFW\actions\Actions;


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

    public function getResponse()
    {
        return $this->response;
    }
}