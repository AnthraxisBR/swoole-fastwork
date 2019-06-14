<?php


namespace Utils\GraphQL\TypeRegistry;


use AnthraxisBR\FastWork\GraphQL\TypeRegistryBase;
use Utils\GraphQL\Users\Fields\SearchUsers;

class TypeRegistry extends TypeRegistryBase
{

    private $SearchUsers;

    public function SearchUsers()
    {
        return $this->SearchUsers ?: ($this->SearchUsers = new SearchUsers($this));
    }
}