<?php


namespace App\tasks;


use AnthraxisBR\SwooleFW\CloudServices\ObjectStorage\ObjectStorage;
use AnthraxisBR\SwooleFW\tasks\TasksReceiver;

class CloudServices extends TasksReceiver
{

    public function cloudServiceTask(ObjectStorage $objectStorage)
    {
        return $objectStorage->uploadObject();
    }

}