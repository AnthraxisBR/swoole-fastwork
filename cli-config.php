<?php
include "vendor/autoload.php";

$conn = new \AnthraxisBR\FastWork\database\Connect();

$conn->changePath();

$em = $conn->connect();
$em = $conn->getEntityManager();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);