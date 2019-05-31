<?php


namespace AnthraxisBR\SwooleFW\Defining;


class Required
{

    public static function string(string $string) : bool
    {
        return is_string($string) and $string != '';
    }
}