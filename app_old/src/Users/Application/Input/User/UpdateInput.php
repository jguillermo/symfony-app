<?php

namespace Misa\Users\Application\Input\User;

/**
 * UpdateInput Class
 *
 * @package Misa\Users\Application\Input\User
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 *  * @method string id()
 */
class UpdateInput extends CreateInput
{
    protected $id;

    /**
     * UpdateInput constructor.
     * @param $id
     * @param $name
     * @param $lastName
     * @param $secondLastName
     */
    public function __construct($id, $name, $lastName, $secondLastName)
    {
        $this->id = $id;
        parent::__construct($name,$lastName,$secondLastName);
    }

}