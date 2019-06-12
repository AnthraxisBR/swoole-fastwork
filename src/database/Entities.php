<?php


namespace AnthraxisBR\FastWork\database;


use AnthraxisBR\FastWork\Exceptions\DatabaseExceptions;
use AnthraxisBR\FastWork\Exceptions\ItemNotFoundException;
use AnthraxisBR\FastWork\Http\Request;
use AnthraxisBR\FastWork\tasks\TasksManager;
use Doctrine\ORM\ORMException;
use AnthraxisBR\FastWork\traits\Injection;
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

    public function willCreate(TasksManager $tasksManager, Request $data){
        return [[
                'entity' => $this,
                'signature' => 'EntitiesDefault@createMultipleEntities',
                'data' => $data->getData(),
                'headers' => $data->getHeaders()
            ]];

            $tasksManager->signature();
            return $tasksManager->startTask($request->getData(),$request->getHeaders(),$request->getServerJson());
            echo 'creating';
            //return $this->create($data);

    }

    public function createAll($data)
    {
        $rs = [];
        foreach ($data as $item){
            $rs[] = $this->create($item);
        }
        return $rs;
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

    public function search(Entities $entity)
    {
        $args = $this->getEntityEvaluatedAttributes($entity);

        $data = $this->em->getRepository(get_class($this))->findBy($args);

        if(is_null($data)){
            throw new ItemNotFoundException(
                [
                    'message' => sprintf("Unable to find items from args : '%s' ", implode(',', $args)) . ' using entity ' . get_class($this),
                    'errors' =>  [
                        'Items not found using args : ' . implode(',', $args)
                    ]
                ]
            );
        }
        return $data;
    }

    public function getEntityEvaluatedAttributes(Entities $entity)
    {
        $reflection = new \ReflectionClass($entity);
        return $reflection->getProperties(\ReflectionProperty::IS_PRIVATE);

    }

    public function searchLike(Entities $entity)
    {
        $args = $this->getEntityEvaluatedAttributes($entity);

        $query = $this->em->getRepository(get_class($this))->createQueryBuilder('e');

        $q = 0;
        foreach ($args as $name => $value){
            if($q == 0){
                $query = $query->where('e.' . $name . ' LIKE  :' . $value);
            }else{
                $query = $query->orWhere('e.' . $name . ' LIKE  :' . $value);
            }
            $q += 1;
        }
        $data = $query->getQuery()->getResult();

        if(is_null($data)){
            throw new ItemNotFoundException(
                [
                    'message' => sprintf("Unable to find items from args : '%s' ", implode(',', $args)) . ' using entity ' . get_class($this),
                    'errors' =>  [
                        'Items not found using args : ' . implode(',', $args)
                    ]
                ]
            );
        }

        return $data;

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