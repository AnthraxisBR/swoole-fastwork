<?php
namespace AnthraxisBR\FastWork\Prototype;


abstract class Prototype
{
    /**
     * @var string
     */
    protected $closure = '';

    /**
     * @var string
     */
    protected $args = '';

    abstract function __clone();

    /**
     * @return string
     */
    public function getClosure(): string
    {
        return $this->closure;
    }

    /**
     * @param string $closure
     */
    public function setClosure(string $closure): void
    {
        $this->closure = $closure;
    }

    /**
     * @return string
     */
    public function getArgs(): string
    {
        return $this->args;
    }

    /**
     * @param string $args
     */
    public function setArgs(string $args): void
    {
        $this->args = $args;
    }



}