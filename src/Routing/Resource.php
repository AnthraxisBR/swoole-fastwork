<?php


namespace AnthraxisBR\FastWork\Routing;


class Resource extends Route
{

    public $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;

        $this->putMethod('GET',$this->resource . 'Resource@index');
        $this->putMethod('POST',$this->resource . 'Resource@store');
        $this->putMethod('GET',$this->resource . 'Resource@show');
        $this->putMethod('PUT',$this->resource . 'Resource@update');
        $this->putMethod('DELETE',$this->resource . 'Resource@destroy');

    }

}