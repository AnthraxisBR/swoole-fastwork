<?php


namespace App\Tasks;


use AnthraxisBR\FastWork\CloudServices\ObjectStorage\ObjectStorage;
use AnthraxisBR\FastWork\Tasks\TasksReceiver;

class CloudServices extends TasksReceiver
{

    public function cloudServiceTask(ObjectStorage $objectStorage)
    {
        return $objectStorage->uploadObject();
    }

}