<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\database\Entities;
use AnthraxisBR\FastWork\providers\BaseProvider;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;


class EntitiesProvider extends BaseProvider implements ServiceProviderInterface
{

    public $object_reference;

    private $name;

    public function __construct()
    {
        $this->setObjectReference('AnthraxisBR\FastWork\database\Entities');
        $this->setName('entity');
    }

    public function getReference()
    {
        return $this->object_reference;
    }

    /**
     * @return string
     */
    public function getObjectReference(): string
    {
        return $this->object_reference;
    }

    /**
     * @param string $object_reference
     */
    public function setObjectReference(string $object_reference): void
    {
        $this->object_reference = $object_reference;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }



}