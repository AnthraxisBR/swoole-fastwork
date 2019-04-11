<?php


namespace GabrielMourao\SwooleFW\database;


class Entitites
{

    private $connect;

    private $em;

    public function __construct()
    {
        $this->connect = new Connect();
        $this->em = $this->connect->getEntityManager();
    }

    public function em()
    {
        return $this->em;
    }

}