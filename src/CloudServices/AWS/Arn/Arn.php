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
        $this->arn = "arn:aws:lambda:{$object->getLocation()}:{$object->getAccountId()}:function:{$object->getFunctionName()}";
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->arn;
    }

}