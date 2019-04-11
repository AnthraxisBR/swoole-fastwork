<?php

namespace database\entity;


use Doctrine\ORM\Mapping as ORM;
use GabrielMourao\SwooleFW\database\Entitites;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users extends Entitites
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    public $id;

    /** @ORM\Column(type="string",length=250) */
    public $name;

    /** @ORM\Column(type="string",length=250) */
    public $password;

    /** @ORM\Column(type="string", length=250) */
    public $email;

    public function __construct()
    {
    }

    public function getName() { return $this->name; }
    public function getPassword() { return $this->password; }
    public function getEmail() { return $this->email; }

    public function __toString()
    {
        return json_encode($this);
    }
}
