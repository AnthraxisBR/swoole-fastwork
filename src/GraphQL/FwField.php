<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:16
 */

namespace AnthraxisBR\FastWork\GraphQL;


use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\Database\Entities;
use AnthraxisBR\FastWork\Exceptions\DatabaseExceptions;
use AnthraxisBR\FastWork\Exceptions\ItemNotFoundException;
use AnthraxisBR\FastWork\traits\ObjectIdentity;
use GraphQL\Type\Definition\FieldDefinition;
use GraphQL\Type\Definition\Type;

class FwField extends FieldDefinition
{
    use ObjectIdentity;

    public $field_name = [];

    public $fw_config = [];

    public $obj;

    public $field = null;

    public $resolve;

    /**
     * @var Entities
     */
    public $entity = null;

    public function __construct(FwObjectType $obj = null, $config = null, $entity = null)
    {
        $this->obj = $obj;

        if(!is_null($entity)){
            $this->entity = $entity;
        }

        $this->setFieldName($this->whoAmI());

        if(is_null($config)){
            /**
             * Defined on final class
             */

            $config['args'] = $this->getArgs();
            $config['name'] = $this->field_name;
            $config['type'] = $this->getType();
/*
            $config['resolve'] = function ($root, $args) {
                return $this->resolve($root, $args);
            };*/

            $this->fw_config = $config;
            $exp = explode('\\', $this->field_name);
            $n = $exp[count($exp) - 1];
            $this->field_name = [
                    'name' => $n,
                    'args' => $config['args'],
                    'type' => $config['type'],
                    'resolve' => function ($root, $args) {
                        return $this->buildResolve($args);
                    }
            ];

        }else{
            parent::__construct($config);
        }
    }

    public function getResolvedFunction($root = '', $args = []) //: Actions
    {
        $resolve_exp = explode('::',$this->resolve);
        if(count($resolve_exp) == 1){
            $function = $resolve_exp[1];
            try {
                return $this->obj->{$function}($args);
            }catch (\Exception $e) {
                var_dump($e->getTrace());
            }
        }
    }

    public function buildResolve($args)
    {

        try{
            return $this->resolve($args);
        }catch ( ItemNotFoundException $e){
            var_dump($e->getMessage());
            if(isset($this->responses[get_class($e)])){
                $sp = [$this->responses[get_class($e)]];
                $sp = array_merge($sp, array_values($args));
                return json_encode([
                    'message' => 'Item not found resolving Field: ' . $this->field_name,
                    'errors' =>  [
                        call_user_func_array('sprintf', $sp)
                    ]
                ]);

            }else{
                return $e->getMessage();
            }
        } catch ( DatabaseExceptions$e){
            if(isset($this->responses[get_class($e)])){
                $sp = [$this->responses[get_class($e)]];
                $sp = array_merge($sp, array_values($args));

                return json_encode([
                    'message' => 'Database error resolving Field: ' . $this->field_name,
                    'errors' =>  [
                        call_user_func_array('sprintf', $sp)
                    ]
                ]);
            }else {
                return $e->getMessage();
            }
        } catch (\Exception $e ){
            if(isset($this->responses[get_class($e)])){
                $sp = [$this->responses[get_class($e)]];
                $sp = array_merge($sp, array_values($args));

                return json_encode([
                    'message' => 'Undefined error resolving Field: ' . $this->field_name,
                    'errors' =>  [
                        call_user_func_array('sprintf', $sp)
                    ]
                ]);
            }else {
                return json_encode([
                    'message' => "Not identified error on call function 'unique' on Entities, see: ",
                    'errors' =>  [
                        $e->getTraceAsString()
                    ]
                ]);

            }
        }
    }

    public function getField()
    {
        return $this->field_name;
    }

    public function setFields() : array
    {
        $response = [];
        $response[] = [];
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

            $exp = explode('::', $arg);
            if(count($exp) > 1){
                $max_index = count($exp) - 1;
                $i = 0;
                foreach ($exp as $type){
                    if(isset($exp[count($exp) - 2])){
                        $prev = count($exp) - 2;
                    }
                    if($i == $max_index){
                        $args[$arg_name] = Type::{$exp[$prev]}(Type::{$type}());
                    }
                    $i += 1;
                }
            }else{
                $args[$arg_name] = $this->getType($arg);
            }

        }
        return $args;
    }

    public function getType(string $type = null)
    {

        if(is_null($type)){
            if(is_string($this->type)){
                return Type::{$this->type}();
            }else{
                return $this->type;
            }
        }
        return Type::{$type}();
    }
    public function setFieldName(string $field_name = '') : void
    {
        $this->field_name = $field_name;
    }

}