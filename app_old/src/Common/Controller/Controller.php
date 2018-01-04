<?php

namespace Misa\Common\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Controller extends FOSRestController
{
    /**
     * @return array
     */
    public function getParsedBody()
    {
        if ('application/json' != $this->getRequest()->headers->get('Content-Type')) {
            throw new BadRequestHttpException('El tipo de entrada de datos debe ser en formato json');
        }

        return $this->getRequest()->request->all();
    }

    public function getRequest()
    {
        return $this->get('request_stack')->getCurrentRequest();
    }
}
