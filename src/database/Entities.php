<?php


namespace AnthraxisBR\SwooleFW\database;


use Doctrine\ORM\ORMException;
use AnthraxisBR\SwooleFW\traits\Injection;

class Entities
{

    use Injection;

    public static $injection_reference = 'entities';

    private $graphql = null;

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

    public function create($data)
    {
        if(is_object($data)){
            $object = $this->getObject($data);
            $this->em->persist($object);
            $this->em->flush();
            return $object;
        }elseif (is_array($data)){
            $response = [];
            foreach ($data as $row){
                $object = $this->getObject($row);
                $this->em->persist($object);
                $this->em->flush();
                $response[] = $object;
            }
            return $response;
        }else{
            return new \stdClass();
        }
    }

    public function unique(int $primaryKey = 0)
    {
        if($primaryKey > 0){
            try {
                $data = $this->em->getRepository(get_class($this))->find($primaryKey);
                if(is_null($data)){
                    return new \stdClass();
                }
                return $data;
            }catch ( ORMException $e){
                var_dump($e->getMessage());
                return new \stdClass();
            }
        }
        return new \stdClass();
    }

    public function getObject($object)
    {
        $class = get_class($this);
        $class = new $class();
        foreach ($object as $attr => $item){
            $class->{$attr} = $item;
        }
        return $class;
    }

    public function graphql()
    {
        return $this->graphql;
    }



}