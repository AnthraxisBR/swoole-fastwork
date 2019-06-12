<?php


namespace App\tasks;


use AnthraxisBR\FastWork\CloudServices\ObjectStorage\ObjectStorage;
use AnthraxisBR\FastWork\tasks\TasksReceiver;

class CloudServices extends TasksReceiver
{

    public function cloudServiceTask(ObjectStorage $objectStorage)
    {
        return $objectStorage->uploadObject();
    }

}