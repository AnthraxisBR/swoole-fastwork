<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\Arn;


use AnthraxisBR\SwooleFW\CloudServices\CloudFunctions\CloudFunctions;
use AnthraxisBR\SwooleFW\CloudServices\CloudService;

class Arn
{

    public $arn = '';

    public function __construct(CloudService $object)
    {
        if($object instanceof CloudService ){
            $this->buildLambdaArn($object);
        }
    }

    public function buildLambdaArn(CloudFunctions $object)
    {

        $role = new $object->role();

        if(!isset($role->name)){
            $role_name = get_class($role);
            $exp_role_name = explode('\\', $role_name);
            $role_name = $exp_role_name[count($exp_role_name) - 1];
        }else{
            $role_name = $role->name;
        }
        $this->arn = "arn:aws:{$role->service}::{$role->account->id}:role/{$role_name}";
        //{$object->getRegion()}
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->arn;
    }

}