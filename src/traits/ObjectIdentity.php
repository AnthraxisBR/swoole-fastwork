<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 13/04/2019
 * Time: 11:22
 */

namespace AnthraxisBR\SwooleFW\traits;


trait ObjectIdentity
{

    public function whoAmI() {
        return get_called_class();
    }
}