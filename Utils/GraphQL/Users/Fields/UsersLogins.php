<?php


namespace Utils\GraphQL\Users\Fields;


use AnthraxisBR\FastWork\Exceptions\DatabaseExceptions;
use AnthraxisBR\FastWork\Exceptions\ItemNotFoundException;
use AnthraxisBR\FastWork\GraphQL\FwField;
use Exception;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\Type;
use Utils\GraphQL\Users\Objects\UserType;

final class UsersLogins extends FwField
{
    public $responses = [
        ItemNotFoundException::class => 'Nenhum usuário localizado com o primaryKey: %s',
        DatabaseExceptions::class => 'Erro ao comunicar com o banco de dados',
        Exception::class => "Um erro não identificado ocorreu ao executar a query"
    ];


    public $args = [
        'id' => NonNull::INT
    ];

    public function boot()
    {

        /**
         * You need to use boot to set instance on type or args
         */
        $this->type = Type::listOf(new UserType());

    }

    public function resolve(array $args)
    {
        var_dump($args);
        return $this->entity->unique($args['id']);
    }
}