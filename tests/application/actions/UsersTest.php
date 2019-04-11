<?php

namespace tests\src\routes;

use App\actions\Users;
use tests\TestCase;

class UsersTest extends TestCase
{
    public function testSetPrefixes()
    {
        $users = new Users();
        $users->index();

    }
}