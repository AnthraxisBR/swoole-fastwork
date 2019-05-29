<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:40
 */

namespace database\graphql\Users;


use AnthraxisBR\SwooleFW\graphql\FwObjectType;
use AnthraxisBR\SwooleFW\graphql\GraphQL;
use mysql_xdevapi\Exception;

/**
 * Class Users
 * @package database\graphql\Users
 */
class Users extends GraphQL
{

    public function __construct($entity, $query)
    {
        parent::__construct($entity, $query);
    }

}