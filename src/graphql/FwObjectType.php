<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:13
 */

namespace GabrielMourao\SwooleFW\graphql;

use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class FwObjectType extends ObjectType
{

    public $fw_fields = [];

    public $fw_name = '';

    public function __construct($config = null)
    {
        [
            'name' => 'Query',
            'fields' => [
                'echo' => [
                    'type' => Type::string(),
                    'args' => [
                        'message' => ['type' => Type::string()],
                    ],
                    'resolve' => function ($root, $args) {
                        return $root['prefix'] . $args['message'];
                    }
                ],
            ],
        ];

        if(is_null($config )){
            $this->findFields();
            $config['name'] = $this->fw_name;
            $config['fields'] = $this->convertFwFields();
        }

        parent::__construct($config);
    }

    private function convertFwFields() : array
    {
        $namespace = '\database\graphql\Users\Fields';
        $convertedFields = [];
        foreach ($this->fw_fields as $field) {
            $full_namespace = $namespace . '\\' . $field;
            $class = $full_namespace;
            $fieldInstance = new $class();
            if($fieldInstance instanceof FieldDefinition){
                $convertedFields[] = $fieldInstance->getField();
            }
        }
    }

    public function findFields() : void
    {
        $fields = scandir(getenv('root_folder') . 'database/graphql/' . $this->fw_name . '/Fields');
        foreach ($fields as $field) {
            $field_exp = explode('.');
            if(count($field_exp) == 2){
                if($field_exp[1] == 'php'){
                    $this->fw_fields[] = $field;
                }
            }
        }
    }


    public function setName(string $name  = '') : void
    {
        $this->fw_name = $name;
    }

    public function setFields(array $fields = []) : void
    {
        $this->fw_fields = $fields;
    }
}