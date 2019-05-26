<?php
include "vendor/autoload.php";

$conn = new \AnthraxisBR\SwooleFW\database\Connect();

$em = $conn->connect();
$em = $conn->getEntityManager();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);