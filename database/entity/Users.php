<?php

namespace database\entity;


use Doctrine\ORM\Mapping as ORM;

use AnthraxisBR\SwooleFW\database\Entities;
use Doctrine\ORM\Mapping\ClassMetadata;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class Users extends Entities
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    public $id;

    /** @ORM\Column(type="string",length=250) */
    public $name;

    /** @ORM\Column(type="string",length=250) */
    public $password;

    /** @ORM\Column(type="string", length=250) */
    public $email = null;

    /** @ORM\Column(type="string", length=250) */
    public $text = null;

    public function getName() : string { return $this->name; }
    public function getPassword() : string { return $this->password; }
    public function getEmail() : string { return $this->email; }

    public static function loadMetadata(ClassMetadata $metadata)
    {
        $metadata->mapField([
            'id' => true,
            'fieldName' => 'id',
            'type' => 'integer'
        ]);

        $metadata->mapField([
            'fieldName' => 'name',
            'type' => 'string',
            'options' => [
                'fixed' => true,
                'comment' => "User's name"
            ]
        ]);

        $metadata->mapField([
            'fieldName' => 'password',
            'type' => 'string',
            'options' => [
                'fixed' => true,
                'comment' => "User's password"
            ]
        ]);

        $metadata->mapField([
            'fieldName' => 'email',
            'type' => 'string',
            'options' => [
                'fixed' => true,
                'comment' => "User's email"
            ]
        ]);
    }

    public function __toString()
    {
        return json_encode($this);
    }
}
