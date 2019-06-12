<?php


namespace AnthraxisBR\FastWork\graphql;


class TypeRegistryBase
{

    public function getTypes() : array
    {
        $reflection = new ReflectionClass($this);
        return $reflection->getProperties(ReflectionProperty::IS_PRIVATE);
    }

}