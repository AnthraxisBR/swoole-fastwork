<?php

namespace GabrielMourao\SwooleFW\actions;

use GabrielMourao\SwooleFW\database\Entitites;

class  Actions
{

    public $response;

    public function __construct()
    {

        $this->conn = new Entitites();

    }

}