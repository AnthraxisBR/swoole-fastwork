<?php

namespace AnthraxisBR\FastWork\ClassGenerator\FastWork;

use AnthraxisBR\FastWork\Actions\Actions;
use AnthraxisBR\FastWork\ClassGenerator\ClassGenerator;
use \Nette\PhpGenerator\PhpNamespace;

class ActionGenerator extends ClassGenerator
{

    public static function make($classname)
    {

        $classname = $classname. 'Action';

        $namespace = new PhpNamespace('App\Actions');

        $class = $namespace->addClass($classname );

        $class->addExtend(Actions::class);

        $full_path = getenv('root_folder') . 'application/Actions';

        $file = fopen($full_path . '/' . $classname . '.php','w');

        $text = (string) $namespace;

        self::writeClass($text, $file);
    }
}