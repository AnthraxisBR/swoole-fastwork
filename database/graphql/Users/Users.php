<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:40
 */

namespace database\graphql\Users;


use GabrielMourao\SwooleFW\graphql\FwObjectType;
use GabrielMourao\SwooleFW\graphql\GraphQL;

class Users extends GraphQL
{

    public function find($message)
    {
        return $message;
    }

}