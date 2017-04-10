<?php
namespace Misa\Users\Application\Services\Employee;

use Misa\Common\Exception\BadRequest;
use Misa\Common\Service\Auth0;
use Misa\Common\Service\EncryptService;
use Misa\Common\Service\PasswordService;
use Misa\Users\Domain\Employee\Employee;
use Misa\Users\Domain\Employee\EmployeeRepository;
use Misa\Users\Presentation\EmployeePresentation;

/**
 * ListService Class
 *
 * @package ${NAMESPACE}
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListService
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    /** @var  EmployeePresentation */
    private $employeePresentation;

    /** @var  EncryptService */
    private $encryptService;

    /** @var  PasswordService */
    private $passwordService;

    /** @var  Auth0 */
    private $auth0;

    /**
     * ListService constructor.
     * @param EmployeeRepository $employeeRepository
     * @param EmployeePresentation $employeePresentation
     * @param EncryptService $encryptService
     * @param PasswordService $passwordService
     * @param Auth0 $auth0
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        EmployeePresentation $employeePresentation,
        EncryptService $encryptService,
        PasswordService $passwordService,
        Auth0 $auth0)
    {
        $this->employeeRepository = $employeeRepository;
        $this->employeePresentation = $employeePresentation;
        $this->encryptService = $encryptService;
        $this->passwordService = $passwordService;
        $this->auth0 = $auth0;
    }


    /**
     * @param $filter
     * @return array
     */
    public function listAll($filter)
    {
        return $this->employeeRepository->listAll($filter);
    }

    /**
     * @param $employeeId
     * @return Employee
     */
    public function find($employeeId)
    {
        return $this->employeeRepository->find($employeeId);
    }

    /**
     * @param $employeeId
     * @return array
     */
    public function listById($employeeId)
    {
        /** @var Employee $employee */
        $employee  = $this->employeeRepository->findExp($employeeId);
        return $this->employeePresentation->getById($employee);
    }

    public function auth($user,$password)
    {
        $txtErrorauth = 'el usuario o password no es correcto';

        $userName = $this->encryptService->encrypt($user);

        $employee = $this->employeeRepository->findByUser($userName);
        if(is_null($employee)){
            throw new BadRequest($txtErrorauth);
        }

        if(!$this->passwordService->verify($employee->userPassword(),$password)){
            throw new BadRequest($txtErrorauth);
        }

        $session = [
            'name'=> $employee->user()->name().' '.$employee->user()->lastName(),
            'id'=>$employee->user()->id(),
            'role'=>$employee->role()
        ];
        return $this->auth0->encode($session,9999);

    }
}
