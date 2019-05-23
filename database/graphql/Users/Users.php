<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:40
 */

namespace database\graphql\Users;


use GabrielMourao\SwooleFW\graphql\FwObjectType;

class Users extends FwObjectType
{

    public function __construct( $config = null, $fw_name = '')
    {
        $this->fw_name = $fw_name;
        parent::__construct($config);
    }
}