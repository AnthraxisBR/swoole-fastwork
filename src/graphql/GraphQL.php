<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:13
 */

namespace GabrielMourao\SwooleFW\graphql;


use GabrielMourao\SwooleFW\database\Entities;
use GabrielMourao\SwooleFW\traits\Injection;
use GraphQL\Type\Schema;
use GraphQL\GraphQL as GraphQLBase;

class GraphQL
{
    use Injection;

    public static $injection_reference = 'graphql';

    private $entity;

    private $query;

    private $query_string;

    private $schema;

    private $input = [];

    public $result;

    public $output;

    public $object_type;

    public function __construct($entity, $query)
    {
        $this->entity = $entity;


        $this->query_string = $query;

        $this->query = json_decode($query);

        $this->build();
    }

    public function build()
    {
        try {

            $entity_str = str_replace('database\entity\\', '', get_class($this->entity));
        }catch (\Exception $e){
            var_dump($e->getMessage());
        }
        /**
         * TODO Fazer a coreção onde está chamando a classe graphql duas vezes de forma errada
         */
         var_dump($entity_str);
        exit();

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