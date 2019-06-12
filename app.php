<?php

include "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$app = new \AnthraxisBR\FastWork\Application();