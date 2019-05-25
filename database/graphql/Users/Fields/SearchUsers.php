<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:20
 */

namespace database\graphql\Users\Fields;

use GabrielMourao\SwooleFW\graphql\FwField;
use GabrielMourao\SwooleFW\graphql\FwObjectType;
use GraphQL\Type\Definition\Type;

final class SearchUsers extends FwField
{

    public $field;

    public function __construct(FwObjectType $obj, $entity)
    {

        $this->field = [
            'name' => 'SearchUsers',
            'type' => Type::string(),
            'args' => [
                'id' => Type::nonNull(Type::int()),
            ],
            'resolve' => function ($root, $args) use($entity) {
                return $entity->unique($args['id']);
            }
        ];

        parent::__construct($obj, $this->field);
    }

}