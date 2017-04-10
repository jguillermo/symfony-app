<?php

namespace Misa\Common\Util;

use Misa\Common\Exception\AppException;

/**
 * AbstractInput Class
 *
 * @package Misa\Common\Util
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AbstractInput
{
    private $properties;

    /**
     * @return array
     */
    protected function getArrayData()
    {
        if (is_null($this->properties)) {
            $this->properties = get_object_vars($this);
        }

        return $this->properties;
    }

    public function __call($name, array $arguments = [])
    {
        if (($properties = $this->getArrayData()) && isset($properties[$name])) {
            return $properties[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        throw new AppException("Invalid property '$name' with value '$value'");
    }
}
