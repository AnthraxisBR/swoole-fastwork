<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:20
 */

namespace AnthraxisBR\SwooleFW\graphql;


final class FwEcho extends FwField
{

    protected $type = 'string';

    protected $args = [
        'message' => [
            'type' => 'string'
        ]
    ];

    protected $resolve = 'User';

}