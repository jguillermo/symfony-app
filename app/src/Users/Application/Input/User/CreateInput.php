<?php

namespace Misa\Users\Application\Input\User;

use Misa\Common\Util\AbstractInput;

/**
 * CreateInput Class
 *
 * @package Misa\Users\Domain\Input\User
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string name()
 * @method string lastName()
 * @method string secondLastName()
 */
class CreateInput extends AbstractInput
{
    protected $name;
    protected $lastName;
    protected $secondLastName;

    /**
     * CreateInput constructor.
     * @param $name
     * @param $lastName
     * @param $secondLastName
     */
    public function __construct($name, $lastName, $secondLastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->secondLastName = $secondLastName;
    }
}
