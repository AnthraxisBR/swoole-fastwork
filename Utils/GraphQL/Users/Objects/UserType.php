<?php

namespace Utils\GraphQL\Users\Objects;

use AnthraxisBR\FastWork\GraphQL\FwObjectType;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class UserType extends ObjectType
{

    public function __construct()
    {
        parent::__construct([
            'name' => 'User',
            'description' => 'A user',
            'fields' => [
                'name' => [
                    'type' => Type::string(),
                    'description' => 'User first name'
                ],
                'email' => Type::string()
            ]
        ]);
    }
}