<?php
namespace Misa\Users\Application\Services\Employee;

use Misa\Common\Exception\AppException;
use Misa\Common\Exception\BadRequest;
use Misa\Common\Exception\Repository\NotFoundException;
use Misa\Common\Exception\SrvErrorException;
use Misa\Common\Service\EncryptService;
use Misa\Common\Service\PasswordService;
use Misa\Users\Domain\Employee\Employee;
use Misa\Users\Domain\User;
use Misa\Users\Domain\Employee\EmployeeRepository;
use Misa\Users\Application\Input\Employee\CreateInput;
use Misa\Users\Domain\UserRepository;

/**
 * MngService Class
 *
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    /** @var  UserRepository */
    private $userRepository;

    /** @var  EncryptService */
    private $encryptService;

    /** @var  PasswordService */
    private $passwordService;

    /**
     * MngService constructor.
     * @param EmployeeRepository $employeeRepository
     * @param UserRepository $userRepository
     * @param EncryptService $encryptService
     * @param PasswordService $passwordService
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        UserRepository $userRepository,
        EncryptService $encryptService,
        PasswordService $passwordService)
    {
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
        $this->encryptService = $encryptService;
        $this->passwordService = $passwordService;
    }


    public function create(CreateInput $cretateInput)
    {
        if($this->exist($cretateInput->userId())){
            throw new AppException("el empleado ya esta registrado");
        }

        /** @var User $user */
        $user = $this->userRepository->findExp($cretateInput->userId());

        $userName = $this->encryptService->encrypt($cretateInput->user());
        $userPassword = $this->passwordService->create($cretateInput->password());

        /** @var Employee $employeeDb */
        $employeeDb = $this->employeeRepository->findByUser($userName);
        if(!is_null($employeeDb)){
            throw new BadRequest("el nombre de usuario no esta disponible");
        }

        $employee = Employee::create($user, $userName,$userPassword,$cretateInput->role());
        $this->employeeRepository->persist($employee);
        return true;
    }

    /**
     * @param $employeeId
     * @return bool
     */
    public function exist($employeeId)
    {
        $employee = $this->employeeRepository->find($employeeId);
        return (is_null($employee))? false : true;
    }

    public function changeUser($employeeId, $newUser, $currentPassword, $force = false)
    {
        /** @var Employee $employee */
        $employee = $this->employeeRepository->findExp($employeeId);
        if (! $force) {
            if (! $this->passwordService->verify($employee->userPassword(), $currentPassword)) {
                throw new BadRequest("El password no coincide");
            }
        }
        $userEncript = $this->encryptService->encrypt($newUser);
        $employee->changeUserName($userEncript);
        $this->employeeRepository->persist($employee);
        return true;
    }

    /**
     * @param string $employeeId
     * @param string $newPassword
     * @return bool
     */
    public function changePassword($employeeId, $newPassword)
    {
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($employeeId);
        $passwordEncript = $this->passwordService->create($newPassword);
        $employee->changePassword($passwordEncript);
        $this->employeeRepository->persist($employee);
        return true;
    }

}
