<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:20
 */

namespace database\graphql\Users\Fields;



use GabrielMourao\SwooleFW\graphql\FwField;

final class SearchUsers extends FwField
{

    protected $type = 'string';

    protected $args = [
        'id' => [
            'type' => 'int'
        ]
    ];

    protected $resolve = 'User::find';

}