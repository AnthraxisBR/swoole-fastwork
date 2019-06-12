<?php


namespace AnthraxisBR\FastWork\Server;


use AnthraxisBR\FastWork\Routing\Wrapper;
use Tightenco\Collect\Support\Collection;

class ServersCollections extends Collection
{

    public function setNewServer(Wrapper $wrapper, $name)
    {
        $this->put($name, $wrapper);
    }

}