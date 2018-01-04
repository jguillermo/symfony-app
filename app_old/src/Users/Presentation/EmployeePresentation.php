<?php

namespace Misa\Users\Presentation;

use Misa\Users\Domain\Employee\Employee;
use Misa\Users\Domain\Employee\EmployeeRole;

/**
 * EmployeePresentation Class
 *
 * @package Misa\Users\Presentation
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeePresentation
{
    /**
     * @param Employee $employee
     * @return array
     */
    public function getById(Employee $employee)
    {
        return [
            'id' => $employee->user()->id(),
            'name' => $employee->user()->name(),
            'last_name' => $employee->user()->lastName(),
            'role' => EmployeeRole::getLabel($employee->role())
        ];
    }
}
