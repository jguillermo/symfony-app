<?php

namespace Misa\Common\Adapter\Persistence\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Misa\Common\Exception\Repository\NotFoundException;

/**
 * Class DoctrineRepository
 *
 * @package Aptitus\Common\Adapter\Persistence\Doctrine
 * @author jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2016
 */
class DoctrineRepository implements MisaRepository
{
    protected $em;
    protected $entityName;
    protected $repository;

    public function __construct(EntityManagerInterface $em, $entityName)
    {
        $this->em = $em;
        $this->entityName = $entityName;
        $this->repository = $this->em->getRepository($entityName);
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function getTableName()
    {
        return $this->em->getClassMetadata($this->entityName)->getTableName();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findExp($id)
    {
        $entity = $this->repository->find($id);
        if (is_null($entity)) {
            throw new NotFoundException("Not found ".$id." in ".$this->entityName);
        }
        return $entity;
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @inheritdoc
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @inheritdoc
     */
    public function findOneBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * @inheritdoc
     */
    public function getClassName()
    {
        return $this->entityName;
    }
}
