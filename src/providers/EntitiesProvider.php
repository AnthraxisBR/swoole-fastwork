<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\providers\BaseProvider;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;


class EntitiesProvider extends BaseProvider
{
    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\FastWork\database\Entities';
        $this->name = 'entity';
/*

        $whoops = new Run();
        $handler = new PrettyPageHandler();

        $whoops->pushHandler($handler);

        $whoops->register();
*/


    }

    public function getReference()
    {
        return $this->object_reference;
    }

}