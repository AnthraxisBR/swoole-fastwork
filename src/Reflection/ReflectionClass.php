<?php


namespace AnthraxisBR\FastWork\Reflection;

class ReflectionClass extends \ReflectionClass
{

    private $base;


    public function checkFullObjectReference()
    {
        return $this->isSubclassOf($this->getBase()->getObjectReference()) || is_a(get_class($this), $this->getBase()->getObjectReference(), true);
    }

    public function getClassName()
    {
        return $this->getClass()->name;
    }

    /**
     * @return mixed
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param mixed $base
     */
    public function setBase($base): void
    {
        $this->base = $base;
    }




}