<?php

//include "../application/bootstrap.php";


use AnthraxisBR\SwooleFW\Routing\Route;
use AnthraxisBR\SwooleFW\Routing\Post;
use AnthraxisBR\SwooleFW\Routing\Multiple;
use AnthraxisBR\SwooleFW\Routing\Get;


$routes = Route::implements(
    $prefix = 'api',
    $routes =
    [
        (new Multiple(['POST','GET']))
            ->name('\users')
            ->actionPost('Users@store')
            ->actionGet('Users@index')
            ->graphqlEnabled(true),

        (new Get())
            ->name('\users\<int:id>')
            ->args(['id'])
            ->action('Users@get_user'),

        (new Post())
            ->name('\tasks')
            ->action('Tasks@create')
    ]
);

