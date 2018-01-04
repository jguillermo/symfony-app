<?php
/**
 * UserRepository Class
 *
 * @package Misa\Users\Domain\Infrastructure\Persistence\Db
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
namespace Misa\Users\Infrastructure\Persistence\Doctrine;

use Misa\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Misa\Users\Domain\User;
use Misa\Users\Domain\UserRepository;

class UserDbRepository extends DoctrineRepository implements UserRepository
{
    /**
     * {@inheritdoc}
     */
    public function listAll($filter)
    {
        return $this->getAllQuery($filter)->getArrayResult();
    }

    private function getAllQuery($filter)
    {
        $qbd = $this->repository->createQueryBuilder('p')
            ->select('p');

        if (! empty($filter['id'])) {
            $qbd->where('p.id = :userId')
                ->setParameter('userId', $filter['id']);
        }

        if (! empty($filter['limit'])) {
            $qbd->setMaxResults($filter['limit']);
        }

        if (! empty($filter['order'])) {
            $qbd->addOrderBy($filter['order']);
        }

        return $qbd->getQuery();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function persist(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        $this->em->remove($user);
        $this->em->flush();
        return true;
    }
}
