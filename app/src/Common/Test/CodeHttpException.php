<?php

namespace Misa\Common\Test;

/**
 * CodeHttpException Class
 *
 * @package Misa\Common\Test
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class CodeHttpException extends \Exception
{
    private $body;

    /**
     * CodeHttpException constructor.
     * @param string $message
     * @param MisaTestResponse $response
     */
    public function __construct($message, MisaTestResponse $response)
    {
        parent::__construct($message, $response->statusCode());
        $this->body = $response->body();
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }
}
