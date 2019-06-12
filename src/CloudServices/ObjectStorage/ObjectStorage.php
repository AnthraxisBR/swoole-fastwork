<?php


namespace AnthraxisBR\FastWork\CloudServices\ObjectStorage;


use AnthraxisBR\FastWork\CloudServices\CloudService;
use AnthraxisBR\FastWork\CloudServices\CloudServicesCommandsInterface;

class   ObjectStorage extends CloudService implements CloudServicesCommandsInterface
{

    public $original;

    public function __construct($original)
    {
        $this->original = $original;
    }

    public function readCommand($command)
    {

        if($command == 'upload'){
            $command = 'uploadObject';
        }

        if($command == 'show'){
            $command = 'listObjects';
        }

        if($command == 'get'){
            $command = 'listObjects';
        }

        if($command == 'list'){
            $command = 'listObjects';
        }

        return $command;
    }

}