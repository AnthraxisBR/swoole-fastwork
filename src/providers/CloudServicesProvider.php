<?php

namespace AnthraxisBR\FastWork\providers;


use AnthraxisBR\FastWork\Database\Entitites;
use AnthraxisBR\FastWork\providers\BaseProvider;
use AnthraxisBR\FastWork\traits\Injection;

class CloudServicesProvider extends BaseProvider implements ServiceProviderInterface
{

    public $object_reference;

    public $name;

    public function __construct()
    {
        $this->object_reference = 'AnthraxisBR\FastWork\CloudServices\CloudServices';
        $this->name = 'cloud_services';
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