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

    public function all()
    {
        return $this->em->getRepository(get_class($this))->findAll();
    }

    public function unique(int $primaryKey = 0)
    {
        if($primaryKey > 0){
            return $this->em->getRepository(get_class($this))->find($primaryKey);
        }
        return [];
    }
}