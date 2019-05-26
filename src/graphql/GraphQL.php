<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:13
 */

namespace AnthraxisBR\SwooleFW\graphql;


use AnthraxisBR\SwooleFW\database\Entities;
use AnthraxisBR\SwooleFW\traits\Injection;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\GraphQL as GraphQLBase;

class GraphQL
{
    use Injection;

    public static $injection_reference = 'graphql';

    public $entity;

    private $query;

    private $query_string;

    private $schema;

    private $input = [];

    public $result;

    public $output;

    public $object_type;

    public function __construct($entity, $query)
    {

        $name = get_class($this);
        $name_exp = explode('\\',$name);
        $name = $name_exp[count($name_exp) - 1];

        $this->object_type = new FwObjectType($entity, $name);

        $this->entity = $entity;

        $this->query_string = $query;

        $this->query = json_decode($query);

        $this->build();
    }

    public function build()
    {
        $this->schema = new Schema([
            'query' => $this->object_type
        ]);

        $query = json_decode($this->query_string)->query;
        $this->result = GraphQLBase::executeQuery($this->schema, $query, null , null, isset($this->input['variables']) ? $this->input['variables'] : null);
        $this->output = $this->result->toArray();
    }
}