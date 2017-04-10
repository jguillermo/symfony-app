<?php

namespace Misa\Common\Entity;

use Misa\Common\Exception\AppException;
use Ramsey\Uuid\Uuid;

/**
 * Euid Class
 *
 * @package Misa\Common\Entity
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaUuid
{
    private $id;

    /**
     * Euid constructor.
     * @param string $id
     * @throws AppException
     */
    public function __construct($id = '')
    {
        $this->setId($id);
    }

    /**
     * @param $id
     * @throws AppException
     */
    private function setId($id)
    {
        if (! is_string($id)) {
            throw new AppException("el id debe ser un string");
        }
        if ($id == '') {
            $this->id = Uuid::uuid4();
        } else {
            if (! Uuid::isValid($id)) {
                throw new AppException("el id debe ser del tipo uuid");
            }
            $this->id = $id;
        }
    }

    public function getId()
    {
        return $this->id;
    }
}
