<?php


namespace AnthraxisBR\FastWork\providers;


interface ServiceProviderInterface
{

    function getReference();
/*
    public function getFixedsProviders(): array;

    public function getProviderFromName(): ServiceProviderInterface;

    public function setRoutes(): void;*/

    /**
     * @return string
     */
    public function getObjectReference(): string;

    /**
     * @param string $object_reference
     */
    public function setObjectReference(string $object_reference): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;
}