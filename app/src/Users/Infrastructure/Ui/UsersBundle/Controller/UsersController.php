<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\Controller;

use Misa\Users\Application\Input\User\CreateInput;
use Misa\Users\Application\Input\User\UpdateInput;
use Misa\Users\Application\Services\User\ListService as UserListService;
use Misa\Users\Application\Services\User\MngService as UserMngService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    /** @var  UserListService */
    private $userListService;

    /** @var UserMngService  */
    private $userMngService;

    /**
     * UsersController constructor.
     * @param UserListService $userListService
     * @param UserMngService $userMngService
     */
    public function __construct(
        UserListService $userListService,
        UserMngService $userMngService)
    {
        $this->userListService = $userListService;
        $this->userMngService = $userMngService;
    }


    public function getUserAction($userId)
    {
        return new JsonResponse($this->userListService->listById($userId));
    }

    public function getUsersAction()
    {
//        $rep = $this->get("users.user.solr.rep");
//        $repEmployee = $this->get("users.employee.solr.rep");
//        $ids = $rep->indexData();
//        $repEmployee->indexData($ids);
//        return new JsonResponse(['ok']);
        return new JsonResponse($this->userListService->listAll([
            'limit' => 10
        ]));
    }

    /**
     * crear un nuevo usuario
     * @param Request $request
     * @return JsonResponse
     */
    public function postUsersAction(Request $request)
    {
        $userId = $this->userMngService->create(new CreateInput(
            $request->get('name', ''),
            $request->get('last_name', ''),
            $request->get('second_last_name', '')
        ));
        return new JsonResponse([
            'user_id' => $userId,
        ]);
    }

    public function putUserAction(Request $request, $userId)
    {
        $this->userMngService->update(new UpdateInput(
            $userId,
            $request->get('name', null),
            $request->get('last_name', null),
            $request->get('second_last_name', null)
        ));
        return new JsonResponse([
            'ok' => true,
        ]);
    }

    public function deleteUserAction($userId)
    {
        $this->userMngService->delete($userId);
        return new JsonResponse([
            'ok' => true,
        ]);
    }
}
