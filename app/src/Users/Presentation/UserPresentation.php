<?php

namespace Misa\Users\Presentation;

use Misa\Users\Domain\User;

/**
 * UserPresentation Class
 *
 * @package Misa\Users\Presentation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UserPresentation
{
    /**
     * @param User $user
     * @return array
     */
    public function getById(User $user)
    {
        return [
            "id" => $user->id(),
            "name" => $user->name(),
            "last_name" => $user->lastName(),
            "second_last_name" => $user->secondLastName()
        ];
    }
}
