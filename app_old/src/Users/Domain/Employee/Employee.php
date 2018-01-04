<?php

namespace Misa\Users\Domain\Employee;

use Misa\Common\Entity\AbstractEntity;
use Misa\Users\Domain\User;

/**
 * Employee
 */
class Employee extends AbstractEntity
{
    const PASSWORD_DEFAULT = '123456';

    /** @var int */
    private $role;

    /** @var string */
    private $userName;

    /** @var string */
    private $userPassword;

    /** @var User */
    private $user;

    public static function create(User $user, $userName, $userPassword, $role = EmployeeRole::COMMON)
    {
        $employee = new self();
        $employee->user = $user;
        $employee->role = $role;
        $employee->userName = $userName;
        $employee->userPassword = $userPassword;
        return $employee;
    }

    /**
     * @param $newUserName
     * @return Employee
     */
    public function changeUserName($newUserName)
    {
        $this->userName = $newUserName;
        return $this;
    }

    /**
     * @param $newUserPassword
     * @return Employee
     */
    public function changePassword($newUserPassword)
    {
        $this->userPassword = $newUserPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function userPassword()
    {
        return $this->userPassword;
    }

    /**
     * @return int
     */
    public function role()
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function userName()
    {
        return $this->userName;
    }

    /**
     * @return User
     */
    public function user()
    {
        return $this->user;
    }
}
