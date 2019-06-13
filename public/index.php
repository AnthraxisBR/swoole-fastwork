<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../app.php";

use AnthraxisBR\FastWork\Server\Server;


new Server($app);
