<?php

namespace Misa\Users\Domain;

use Misa\Common\Entity\AbstractEntity;
use Misa\Common\Entity\MisaUuid;

/**
 * User
 */
class User extends AbstractEntity
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $lastName;

    /** @var string */
    private $secondLastName;

    /**
     * @param $name
     * @param $lastName
     * @param null $secondLastName
     * @param string $id
     * @return User
     */
    public static function create($name, $lastName, $secondLastName = null, $id='')
    {
        $user = new self();
        $user->id = self::uuid($id)->getId();
        $user->name = $name;
        $user->lastName = $lastName;
        $user->secondLastName = $secondLastName;
        return $user;
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function changeName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $lastName
     */
    public function changeLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param string $secondLastName
     */
    public function changeSecondLastName($secondLastName)
    {
        $this->secondLastName = $secondLastName;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function lastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function secondLastName()
    {
        return $this->secondLastName;
    }
}
