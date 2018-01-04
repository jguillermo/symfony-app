<?php

namespace Misa\Users\Domain;

/**
 * UserSearch Interface
 *
 * @package Misa\Users\Domain
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface UserSearchRepository
{
    /**
     * @param array $filter
     * @return array
     */
    public function listAll($filter);
}