<?php

namespace Misa\Common\Entity;

/**
 * AbstractEntity Class
 *
 * @package Misa\Common\Entity
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
abstract class AbstractEntity
{
    /**
     * @param string $id
     * @return MisaUuid
     */
    public static function uuid($id = '')
    {
        return  new MisaUuid($id);
    }
}
