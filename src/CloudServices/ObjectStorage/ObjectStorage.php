<?php


namespace AnthraxisBR\SwooleFW\CloudServices\ObjectStorage;


class ObjectStorage
{

    public $original;

    public function __construct($original)
    {
        $this->original = $original;
    }

}