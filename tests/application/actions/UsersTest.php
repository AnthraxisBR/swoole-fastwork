<?php

namespace tests\src\routes;

use App\Actions\UsersAction;
use tests\TestCase;

class UsersTest extends TestCase
{
    public function testSetPrefixes()
    {
        $users = new UsersAction();
        $users->index();

    }
}