<?php

namespace AnthraxisBR\FastWork\ClassGenerator\FastWork;

use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\ClassGenerator\ClassGenerator;
use AnthraxisBR\FastWork\GraphQL\GraphQL;
use Nette\PhpGenerator\PhpNamespace;

class GraphQLGenerator extends ClassGenerator
{

    public static function make($classname)
    {

        $classname = $classname;

        $namespace = new PhpNamespace('Utils\GraphQL');

        $class = $namespace->addClass($classname );

        $class->addExtend(GraphQL::class);

        $full_path = getenv('root_folder') . 'Utils/GraphQL';

        $full_path  = $full_path . '/' . $classname;

        mkdir($full_path);

        mkdir($full_path . '/Fields');

        $file = fopen($full_path . '/' . $classname . '.php','w');

        $text = (string) $namespace;

        self::writeClass($text, $file);
    }
}