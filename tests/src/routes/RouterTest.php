<?php

namespace tests\src\routes;

use AnthraxisBR\SwooleFW\routing\RoutesYamlReader;
use tests\TestCase;

class RouterTest extends TestCase
{
    public function testImplementsRoutes()
    {
        $RoutesYamlReader = new RoutesYamlReader();

    }
}