<?php

namespace App\Actions;

use Utils\Entities\Users as UsersEntity;
use Utils\GraphQL\Users\Users as UsersGraphQL;
use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\GraphQL\GraphQL;
use AnthraxisBR\FastWork\Http\Request;
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
        echo json_encode($UsersEntity->all());

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

        //$start = microtime(true);

        return $UsersEntity->create($request->getData());
        //err("Time: " . (microtime(true) - $start),3);
    }
}