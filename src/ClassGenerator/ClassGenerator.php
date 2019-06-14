<?php

namespace AnthraxisBR\FastWork\ClassGenerator;

class ClassGenerator
{

    public static function writeClass($text, $file)
    {

        $base = '<?php ' . PHP_EOL . PHP_EOL . PHP_EOL ;
        $base .= (string) $text;

        fwrite($file, (string) $base);
    }
}