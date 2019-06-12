<?php


namespace database\graphql\TypeRegistry;


use AnthraxisBR\FastWork\graphql\TypeRegistryBase;
use database\graphql\Users\Fields\SearchUsers;

class TypeRegistry extends TypeRegistryBase
{

    private $SearchUsers;

    public function SearchUsers()
    {
        return $this->SearchUsers ?: ($this->SearchUsers = new SearchUsers($this));
    }
}