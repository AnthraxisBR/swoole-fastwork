<?php

namespace App\Resources;

use AnthraxisBR\FastWork\Actions\Actions;
use Utils\Entities\Users;

class ExampleResource extends Actions
{

    public function index(Users $users)
    {
        var_dump($users);
    }

    public function store(Users $users)
    {

    }

    public function show(Users $users)
    {

    }

    public function update(Users $users)
    {

    }

    public function remove(Users $users)
    {

    }
}