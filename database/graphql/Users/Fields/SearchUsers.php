<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:20
 */

namespace database\graphql\Users\Fields;

use AnthraxisBR\SwooleFW\graphql\FwField;
use AnthraxisBR\SwooleFW\graphql\FwObjectType;
use GraphQL\Type\Definition\Type;

final class SearchUsers extends FwField
{

    public $field = null;

    public $type = 'string';

    public $args = [
        'id' => 'nonnull::int'
    ];

    public $resolve;

    public $entity = null;

    public function __construct(FwObjectType $obj, $entity = null)
    {
        parent::__construct($obj = $obj, null, $entity = $entity);
    }

    public function resolve($root, $args)
    {
        return $this->entity->unique($args['id']);
    }

}