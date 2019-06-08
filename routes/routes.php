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
            ->action('Tasks@create'),

        (new Post())
            ->name('\tasks\create-multiple-users')
            ->action('Tasks@createMultipleUsers'),

        (new Get())
            ->name('\cloud')
            ->action('CloudServices@createCloudFunction'),

        (new Post())
            ->name('\async')
            ->action('Async@asyncCall')
    ]
);

