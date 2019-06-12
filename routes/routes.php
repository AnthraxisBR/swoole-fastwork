<?php

//include "../application/bootstrap.php";


use AnthraxisBR\FastWork\Routing\Route;
use AnthraxisBR\FastWork\Routing\Post;
use AnthraxisBR\FastWork\Routing\Multiple;
use AnthraxisBR\FastWork\Routing\Get;


$routes = Route::implements(
    $prefix = 'api',
    $routes =
    [
        (new Multiple(['POST','GET']))
            ->name('\users')
            ->actionPost('Users@store')
            ->actionGet('Users@index')
            ->graphqlEnabled(true),

        (new Post())
            ->name('\users\coroutines')
            ->action('Users@insertUserCoroutine'),
            //->graphqlEnabled(true),

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

