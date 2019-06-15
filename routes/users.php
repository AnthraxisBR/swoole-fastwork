<?php

//include "../application/bootstrap.php";


use AnthraxisBR\FastWork\Routing\Route;
use AnthraxisBR\FastWork\Routing\Post;
use AnthraxisBR\FastWork\Routing\Multiple;
use AnthraxisBR\FastWork\Routing\Get;
use \AnthraxisBR\FastWork\Routing\Resource;

$routes = Route::implements(
    $prefix = 'resources',
    $routes =
        [
            (new Resource('example'))
                ->name('\users')
                ->args(['id'])
                ->action('UsersResource'),
        ]
);

