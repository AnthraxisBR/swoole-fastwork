<?php

include "app.php";

use GabrielMourao\SwooleFW\routing\Router;

$http = new swoole_http_server("0.0.0.0", 8101);

$http->on("start", function ($server) {
    echo "Swoole http server is started at http://0.0.0.0:8101\n";
});

$http->on("request", function ($request, $response) {
    $router = new Router($request);
    $response->header("Content-Type", "application/json");
    $response->end($router->getResponse());
});

$http->start();