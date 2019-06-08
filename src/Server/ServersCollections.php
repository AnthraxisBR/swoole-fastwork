<?php


namespace AnthraxisBR\SwooleFW\Server;


use AnthraxisBR\SwooleFW\Routing\Wrapper;
use Tightenco\Collect\Support\Collection;

class ServersCollections extends Collection
{

    public function setNewServer(Wrapper $wrapper, $name)
    {
        $this->put($name, $wrapper);
    }

}