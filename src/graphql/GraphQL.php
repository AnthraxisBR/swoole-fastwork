<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:13
 */

namespace GabrielMourao\SwooleFW\graphql;


use GraphQL\Type\Schema;
use GraphQL\GraphQL as GraphQLBase;

class GraphQL
{

    private $entity;

    private $query;

    private $query_string;

    private $schema;

    private $input = [];

    public $result;

    public $output;

    public function __construct($entity, $query)
    {
        $this->entity = $entity;

        $this->query_string = str_replace('""','"',json_encode(json_decode($query)->query));

        $this->query = json_decode($query);

        $this->build();
    }

    public function build()
    {

        $entity_str = str_replace('database\entity\\','',get_class($this->entity));


        $class_entity_str = '\database\graphql\\' . $entity_str . '\\' . $entity_str;

        $graphql_fw = new $class_entity_str(null,$entity_str);

        $this->schema = new Schema([
            'query' => $graphql_fw
        ]);

        unset($this->entity);

        $this->result = GraphQLBase::executeQuery($this->schema, $this->query_string, null , null, isset($this->input['variables']) ? $this->input['variables'] : null);
        $this->output = $this->result->toArray();
    }
}