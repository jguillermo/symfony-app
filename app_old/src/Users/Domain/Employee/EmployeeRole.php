<?php

namespace Misa\Users\Domain\Employee;

use Misa\Common\Util\AbstractEnum;

/**
 * EmployeeRole Class
 *
 * @package Misa\Users\Domain\Enum
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeeRole extends AbstractEnum
{
    const ADMIN = 1;
    const COMMON = 2;

    public static function label()
    {
        return [
            'ADMIN' => 'Admin',
            'COMMON' => 'Commún',
        ];
    }
}
