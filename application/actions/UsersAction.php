<?php

namespace App\actions;

use database\entity\Users as UsersEntity;
use database\graphql\Users\Users as UsersGraphQL;
use AnthraxisBR\FastWork\actions\Actions;
use AnthraxisBR\FastWork\graphql\GraphQL;
use AnthraxisBR\FastWork\http\Request;
use go;
use co;
use Swoole\Runtime;

class UsersAction extends Actions
{

    public function graphql(UsersEntity $UsersEntity, UsersGraphQL $UsersGraphQL)
    {
        return $UsersGraphQL;
    }

    public function index(UsersEntity $UsersEntity)
    {
        return $UsersEntity->all();

    }

    public function insertUserCoroutine(Request $request)
    {

        $data = collect($request->getData());

        Runtime::enableCoroutine();

        $data->each(function ($item) use ($request){

            go(function() use (&$user, $request, $item){
                $start = microtime(true);

                $rs = '';
                $user = new UsersEntity();
                $user->create($item);

                echo "Time: " . (microtime(true) - $start) . PHP_EOL;

                co::sleep(1);

                return $rs;
            });
        });

        return ["message" => "Usuário sendo inserido em background"];
    }
    public function get_user(UsersEntity $UsersEntity, int $id )
    {
        echo $UsersEntity->unique($primaryKey= $id);
    }

    public function find(UsersGraphQL $UsersGraphQL)
    {
        return $UsersGraphQL->output;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function store(UsersEntity $UsersEntity, Request $request)
    {

        $start = microtime(true);

        $rs = $UsersEntity->create($request->getData());
        echo "Time: " . (microtime(true) - $start);
        return $rs;
    }
}