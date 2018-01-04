<?php
/**
 * Class RepNotFoundException
 *
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2016, Orbis
 */

namespace Misa\Common\Exception;

class AppException extends \Exception
{
    private $listError;

    /**
     * AptException constructor.
     * @param string $message
     * @param array $listError
     * @param int $code
     */
    public function __construct($message, $listError = [], $code = 0)
    {
        $this->listError = $listError;
        parent::__construct($message, $code);
    }

    /**
     * @return array
     */
    public function getListError()
    {
        return $this->listError;
    }

    /**
     * @param array $listError
     * @return AppException
     */
    public function setListError($listError)
    {
        $this->listError = $listError;
        return $this;
    }

    public function getCountError()
    {
        return count($this->listError);
    }
}
