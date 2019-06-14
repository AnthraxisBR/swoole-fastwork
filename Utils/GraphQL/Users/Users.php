<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:40
 */

namespace Utils\GraphQL\Users;


use AnthraxisBR\FastWork\GraphQL\FwObjectType;
use AnthraxisBR\FastWork\GraphQL\GraphQL;
use mysql_xdevapi\Exception;

/**
 * Class Users
 * @package Utils\GraphQL\Users
 */
class Users extends GraphQL
{

    public function __construct($entity, $query)
    {


        parent::__construct($entity, $query);
    }

}