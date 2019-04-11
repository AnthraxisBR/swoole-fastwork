<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="varchar",length=250) */
    private $user;

    /** @Column(type="varchar",length=250) */
    private $password;

    /** @Column(type="varcher", length=250) */
    private $email;

    public function __construct()
    {
    }

    public function getUser() { return $this->user; }
    public function getPassword() { return $this->password; }
    public function getEmail() { return $this->email; }
}
