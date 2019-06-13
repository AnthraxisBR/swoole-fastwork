<?php

use Dotenv\Dotenv;

include 'vendor/autoload.php';


$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();


return [
    'dbname' => getenv('database'),
    'user' => getenv('dbuser'),
    'password' => getenv('dbpassword'),
    'host' => getenv('dbhost'),
    'port' =>  getenv('dbport'),
    'driver' => getenv('dbdriver'),
];