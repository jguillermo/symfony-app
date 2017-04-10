<?php

namespace Misa\Users\Application\Services\User;

use Misa\Users\Application\Input\User\CreateInput;
use Misa\Users\Application\Input\User\UpdateInput;
use Misa\Users\Domain\User;
use Misa\Users\Domain\UserRepository;

/**
 * MngService Class
 *
 * @package Misa\Users\Domain\Services\User
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    /** @var  UserRepository */
    private $userRepository;

    /**
     * ListService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param CreateInput $userInput
     * @return string userId
     */
    public function create(CreateInput $userInput)
    {
        $user = User::create(
                $userInput->name(),
                $userInput->lastName(),
                $userInput->secondLastName()
            );
        $this->userRepository->persist($user);
        return $user->id();
    }

    /**
     * @param UpdateInput $updateInput
     * @return bool
     */
    public function update(UpdateInput $updateInput)
    {
        /** @var User $user */
        $user = $this->userRepository->findExp($updateInput->id());

        if(!is_null($updateInput->name())){
            $user->changeName($updateInput->name());
        }
        if(!is_null($updateInput->lastName())){
            $user->changeLastName($updateInput->lastName());
        }
        if(!is_null($updateInput->secondLastName())){
            $user->changeSecondLastName($updateInput->secondLastName());
        }

        $this->userRepository->persist($user);

        return true;
    }

    public function delete($userId)
    {
        /** @var User $user */
        $user = $this->userRepository->findExp($userId);
        $this->userRepository->delete($user);
        return true;
    }
}
