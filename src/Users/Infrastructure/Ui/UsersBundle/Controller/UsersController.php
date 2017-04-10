<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class UsersController extends Controller
{

    public function getUsersAction()
    {
        return new JsonResponse([
            'data' => []
        ]);
    }
}
