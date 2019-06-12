<?php

namespace tests\src\routes;

use AnthraxisBR\FastWork\Routing\RoutesYamlReader;
use tests\TestCase;

class RouterTest extends TestCase
{
    public function testImplementsRoutes()
    {
        $RoutesYamlReader = new RoutesYamlReader();

    }

    public function testRouter()
    {
        $RoutesYamlReader = new RoutesYamlReader();

        var_dump($RoutesYamlReader->getRoute(['api','users']));
    }
}