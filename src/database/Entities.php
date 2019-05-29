<?php


namespace AnthraxisBR\SwooleFW\database;


use AnthraxisBR\SwooleFW\Exceptions\DatabaseExceptions;
use AnthraxisBR\SwooleFW\Exceptions\ItemNotFoundException;
use Doctrine\ORM\ORMException;
use AnthraxisBR\SwooleFW\traits\Injection;
use mysql_xdevapi\Exception;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Run;

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
        $class = get_class($this);
        if($primaryKey > 0){
            $data = $this->em->getRepository(get_class($this))->find($primaryKey);
            if(is_null($data)){
                throw new ItemNotFoundException(
                    [
                        'message' => sprintf("Unable to find item : '%s' ", $primaryKey) . ' using entity ' . $class,
                        'errors' =>  [
                            'Item not found using primaryKey: ' . $primaryKey
                        ]
                    ]
                );
            }
            return $data;
        }
        throw new DatabaseExceptions(
            [
                'message' => 'You need to provide some valid primaryKey to fetch unique item on entity: ' . $class,
                'errors' =>  [
                    'invalid primaryKey: ' . $primaryKey
                ]
        ]);
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