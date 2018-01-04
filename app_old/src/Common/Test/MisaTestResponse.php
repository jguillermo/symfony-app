<?php

namespace Misa\Common\Test;

/**
 * MisaTestResponse Class
 *
 * @package Misa\Common\Test
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaTestResponse
{
    private $statusCode;
    private $body;

    /**
     * MisaTestResponse constructor.
     * @param $statusCode
     * @param $body
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function statusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param null $param
     * @return mixed
     */
    public function body($param = null)
    {
        if (is_string($param)) {
            return $this->body[$param];
        }
        return $this->body;
    }
}
