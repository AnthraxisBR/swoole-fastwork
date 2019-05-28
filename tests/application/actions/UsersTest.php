<?php

namespace tests\src\routes;

use App\actions\UsersAction;
use tests\TestCase;

class UsersTest extends TestCase
{
    public function testSetPrefixes()
    {
        $users = new UsersAction();
        $users->index();

    }
}