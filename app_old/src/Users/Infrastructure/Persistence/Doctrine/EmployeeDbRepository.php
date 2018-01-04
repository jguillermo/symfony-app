<?php

namespace Misa\Users\Infrastructure\Persistence\Doctrine;

use Misa\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Misa\Users\Domain\Employee\Employee;
use Misa\Users\Domain\Employee\EmployeeRepository;


/**
 * EmployeeDbRepository Class
 *
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeeDbRepository extends DoctrineRepository implements EmployeeRepository
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
        $qbd = $this->repository->createQueryBuilder('e')
            ->select('e', 'p')
            ->join('e.user', 'p', 'WITH');

        if (! empty($filter['id'])) {
            $qbd->where('p.id = :employeeId')
                ->setParameter('employeeId', $filter['id']);
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
     * @param Employee $employee
     * @return bool
     */
    public function persist(Employee $employee)
    {
        $this->em->persist($employee);
        $this->em->flush();
        return true;
    }

    /**
     * @param $user
     * @return Employee
     */
    public function findByUser($user)
    {
        return $this->repository->findOneBy(['userName' => $user]);
    }
}
