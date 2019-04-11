<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use GabrielMourao\SwooleFW\actions\Actions;


class Users extends Actions
{

    public function index(UsersEntity $UsersEntity)
    {
        return $this->conn->em()->getRepository(get_class($UsersEntity))->findAll();
    }

    public function getResponse()
    {
        return $this->response;
    }
}