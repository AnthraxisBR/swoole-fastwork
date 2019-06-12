<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:13
 */

namespace AnthraxisBR\FastWork\graphql;

use AnthraxisBR\FastWork\database\Entities;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class FwObjectType extends ObjectType
{

    public $fw_fields = [];

    public $fw_name = '';

    public $entity;

    public function __construct($entity, $name, $config = null)
    {
        $this->fw_name = $name;
        if(is_null($config )){
            $this->findFields();
            $config['name'] = $this->fw_name;
            $config['fields'] = $this->convertFwFields($entity);
        }
        parent::__construct($config);
    }

    private function convertFwFields(Entities $entity) : array
    {
        $namespace = '\database\graphql\Users\Fields';
        $convertedFields = [];

        foreach ($this->fw_fields as $field) {
            $full_namespace = $namespace . '\\' . $field;
            $class = $full_namespace;

            $fieldInstance = new $class($this, null, $entity);
            if($fieldInstance instanceof FieldDefinition){
                $convertedField = $fieldInstance->getField();
                $name = $convertedField['name'];
                unset($convertedField['name']);
                $convertedFields[$name] = $convertedField;
            }
        }
        return $convertedFields;
    }

    public function findFields() : void
    {

        $fields = scandir(getenv('root_folder') . '/database/graphql/' . $this->fw_name . '/Fields');

        foreach ($fields as $field) {
            $exp = explode('.', $field);

            if(isset($exp[1] ) and $exp[1] == 'php'){
                $this->fw_fields[] = $exp[0];
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