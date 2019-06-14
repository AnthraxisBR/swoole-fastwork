<?php


namespace AnthraxisBR\FastWork\ClassGenerator\FastWork;

use AnthraxisBR\FastWork\Actions\Actions;
use \Nette\PhpGenerator\PhpNamespace;

class TaskActionGenerator
{



    public static function make($classname)
    {

        $classname = $classname;

        $namespace = new PhpNamespace('App\Tasks');

        $class = $namespace->addClass($classname );

        $class->addExtend(Actions::class);

        $full_path = getenv('root_folder') . 'application/Tasks';

        $file = fopen($full_path . '/' . $classname . '.php','w');

        $text = (string) $namespace;

        self::writeClass($text, $file);
}