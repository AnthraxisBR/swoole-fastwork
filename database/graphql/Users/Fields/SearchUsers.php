<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:20
 */

namespace database\graphql\Users\Fields;

use GraphQL\Type\Definition\Type;
use AnthraxisBR\FastWork\Exceptions\DatabaseExceptions;
use AnthraxisBR\FastWork\Exceptions\ItemNotFoundException;
use AnthraxisBR\FastWork\graphql\FwField;
use GraphQL\Type\Definition\NonNull;
use Exception;

/**
 * Reference for Field to be read when GraophQL is enabled on routes
 * Class SearchUsers
 * @package database\graphql\Users\Fields
 */
final class SearchUsers extends FwField
{

    /**
     * Define messages for exceptions when it throwed by FwField building runtime
     * @var array
     */
    public $responses = [
        ItemNotFoundException::class => 'Nenhum usuário localizado com o primaryKey: %s',
        DatabaseExceptions::class => 'Erro ao comunicar com o banco de dados',
        Exception::class => "Um erro não identificado ocorreu ao executar a query"
    ];

    /**
     * Define field Type
     * @var Type
     */
    public $type = Type::STRING;

    /**
     * Define args types in Field
     * @var array
     */
    public $args = [
        'id' => NonNull::INT
    ];

    /**
     * Resolution function to this field
     * @param array $args
     * @return mixed
     */
    public function resolve(array $args)
    {
        return $this->entity->unique($args['id']);
    }

}