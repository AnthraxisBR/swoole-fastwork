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

    public $type = 'string';

    public $args = [
        'id' => [
            'type' => 'int'
        ]
    ];

    public $resolve = 'Users::find';

}