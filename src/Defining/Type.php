<?php


namespace AnthraxisBR\SwooleFW\Defining;


use function GuzzleHttp\Psr7\str;
use GuzzleHttp\Tests\Psr7\Str;

class Type
{
    public $int = 'int';
    public $float = 'float';
    public $string = 'string';
    public $array = 'array';
    public $object = 'object';

    /**
     * @param int $type
     * @return bool
     */
    public static function int(int $type) : bool
    {
        return (bool) is_int($type);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function string(String $string) : string
    {
        return (bool) is_string($string);
    }
}