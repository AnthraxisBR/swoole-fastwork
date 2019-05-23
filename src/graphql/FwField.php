<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:16
 */

namespace GabrielMourao\SwooleFW\graphql;


use GabrielMourao\SwooleFW\actions\Actions;
use GabrielMourao\SwooleFW\traits\ObjectIdentity;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

class FwField extends FieldDefinition
{
    use ObjectIdentity;

    public $field_name = '';

    public $fw_config = [];

    public function __construct($config = null)
    {
        $this->setFieldName($this->whoAmI());
        if(is_null($config)){
            /**
             * Defined on final class
             */
            $config['args'] = $this->getArgs();
            $config['name'] = $this->name;
            $config['type'] = $this->getType();
            $config['resolve'] = $this->getResolvedFunction();
            $this->fw_config = $config;
        }

        parent::__construct($this->fw_config);
    }

    public function getResolvedFunction($root = '', $args = []) //: Actions
    {
        $resolve_exp = explode('::',$this->resolve);
        if(count($resolve_exp) == 1){
            $class = $resolve_exp[0];
            $function = $resolve_exp[1];
            $full_class = '\App\actions\\' . $class;
            $actions = new $full_class();
            return $actions->{$function}($args);
        }
    }


    public function getField() : array
    {
        $response = [];
        $response[$this->field_name] = [];
        return [
            $this->field_name => [
                'type' => $this->fw_config['type'],
                'args' => $this->fw_config['args'],
                'resolve' => function($root, $args){
                    return $this->getResolvedFunction($root,$args);
                }
            ]
        ];
    }

    public function getArgs() : array
    {
        $args = [];
        foreach ($this->args as $arg_name => $arg){
            $args[$arg_name] = [];
            if(isset($arg['type'])){
                $args[$arg_name]['type'] = $this->getType($arg['type']);
            }
        }
        return $args;
    }

    public function getType(string $type = null) : Type
    {
        if(is_null($type)){
            return Type::{$this->type}();
        }
        return Type::{$type}();
    }
    public function setFieldName(string $field_name = '') : void
    {
        $this->field_name = $field_name;
    }

}