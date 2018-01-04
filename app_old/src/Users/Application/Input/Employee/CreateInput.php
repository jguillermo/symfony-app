<?php

namespace Misa\Users\Application\Input\Employee;

use Misa\Common\Util\AbstractInput;

/**
 * CreateInput Class
 *
 * @package Misa\Users\Application\Input\Employee
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string userId()
 * @method string role()
 * @method string user()
 * @method string password()
 */
class CreateInput extends AbstractInput
{
    protected $userId;
    protected $role;
    protected $user;
    protected $password;

    /**
     * CretateInput constructor.
     * @param $userId
     * @param $role
     * @param $user
     * @param $password
     */
    public function __construct($userId, $role, $user, $password)
    {
        $this->userId = $userId;
        $this->role = $role;
        $this->user = $user;
        $this->password = $password;
    }


}