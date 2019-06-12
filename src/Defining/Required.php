<?php


namespace AnthraxisBR\FastWork\Defining;


class Required
{

    public static function string(string $string) : bool
    {
        return is_string($string) and $string != '';
    }
}