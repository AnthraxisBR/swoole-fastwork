<?php

include 'vendor/autoload.php';

return [
    'dbname' => getenv('database'),
    'user' => getenv('dbuser'),
    'password' => getenv('dbpassword'),
    'host' => getenv('dbhost') . ':' . getenv('dbport'),
    'driver' => getenv('dbdriver'),
];