<?php


namespace App\actions;


use AnthraxisBR\SwooleFW\actions\Actions;
use AnthraxisBR\SwooleFW\CloudServices\CloudServices;
use AnthraxisBR\SwooleFW\CloudServices\CloudServicesYamlReader;
use AnthraxisBR\SwooleFW\http\Request;
use App\CloudServices\Exemplo;


class CloudServicesAction extends Actions
{
    public function index(Request $request, CloudServices $CloudServices)
    {

        $CloudServices->use('AWS');

        $CloudServices->new( new Exemplo($request->rawContent()) );

    }

}