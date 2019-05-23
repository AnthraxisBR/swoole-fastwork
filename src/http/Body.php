<?php


namespace GabrielMourao\SwooleFW\http;


class Body
{

    public $json;

    public $data;

    public function __construct($json)
    {
        $this->json = $json;
        $this->data = json_decode($json);
    }

    public function isGraphQlBody()
    {
        return key($this->data)  == 'query';
    }
}