<?php

namespace AnthraxisBR\FastWork\ClassGenerator\FastWork;

use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\ClassGenerator\ClassGenerator;
use Nette\PhpGenerator\PhpNamespace;

class ModelGenerator extends ClassGenerator
{


    public static function make($classname)
    {

        $classname = $classname;

        $namespace = new PhpNamespace('Utils\Entities');

        $class = $namespace->addClass($classname );

        $class->addExtend(Actions::class);

        $full_path = getenv('root_folder') . 'Utils/Entities';

        $file = fopen($full_path . '/' . $classname . '.php','w');

        $text = (string) $namespace;

        self::writeClass($text, $file);
    }
}