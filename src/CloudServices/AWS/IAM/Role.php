<?php


namespace AnthraxisBR\SwooleFW\CloudServices\AWS\IAM;


class Role
{

    public function __construct()
    {
        $this->account = new $this->account();
    }

    public function __toString()
    {
        return (string) $this;
    }
}