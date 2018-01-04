<?php
/**
 * ListService Class
 *
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace Misa\Users\Application\Services\User;

use Misa\Users\Domain\User;
use Misa\Users\Domain\UserRepository;
use Misa\Users\Presentation\UserPresentation;

class ListService
{
    /** @var  UserRepository */
    private $userRepository;

    /** @var  UserPresentation */
    private $userPresentation;

    /**
     * ListService constructor.
     * @param UserRepository $userRepository
     * @param UserPresentation $userPresentation
     */
    public function __construct(UserRepository $userRepository, UserPresentation $userPresentation)
    {
        $this->userRepository = $userRepository;
        $this->userPresentation = $userPresentation;
    }


    public function listAll($filter)
    {
        return $this->userRepository->listAll($filter);
    }

    public function listById($userId)
    {
        /** @var User $user */
        $user = $this->userRepository->findExp($userId);
        return $this->userPresentation->getById($user);
    }
}
