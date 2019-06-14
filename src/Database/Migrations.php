<?php


namespace AnthraxisBR\FastWork\Database;


class Migrations
{


    protected $reserved = [
        'injection_reference'
    ];

    public function __construct()
    {
        $this->query_builder = new MigrationsQueryBuilder();
    }

    public function createFromEntity(Entities $entity)
    {
        $query = '';
        $reflectedProperties = (new \ReflectionObject($entity))->getProperties(\ReflectionProperty::IS_PUBLIC);
        $properties = [];

        foreach ($reflectedProperties as $prop){
            $name = $prop->getName();
            $comment = $prop->getDocComment();
            if(!in_array($name, $this->reserved)){
                $properties[] = [
                    'name' => $name,
                    'comment' => $comment
                ];
            }
        }
        $name = get_class($entity);
        $exp = explode('\\',$name);
        $name = $exp[count($exp) - 1];
        return $this->query_builder->createTable($name, $properties);
    }
}