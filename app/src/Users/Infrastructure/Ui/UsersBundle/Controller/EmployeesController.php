<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\Controller;

use Misa\Users\Application\Input\Employee\CreateInput;
use Misa\Users\Application\Services\Employee\ListService as EmployeeListService;
use Misa\Users\Application\Services\Employee\MngService as EmployeeMngService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EmployeesController extends Controller
{

    /** @var  EmployeeListService */
    private $employeeListService;

    /** @var  EmployeeMngService */
    private $employeeMngService;

    /**
     * EmployeesController constructor.
     * @param EmployeeListService $employeeListService
     * @param EmployeeMngService $employeeMngService
     */
    public function __construct(
        EmployeeListService $employeeListService,
        EmployeeMngService $employeeMngService)
    {
        $this->employeeListService = $employeeListService;
        $this->employeeMngService = $employeeMngService;
    }

    /**
     * return one employee
     * @param $userId
     * @return JsonResponse
     */
    public function getEmployeeAction($userId)
    {
        return new JsonResponse($this->employeeListService->listById($userId));
    }

    /**
     * list employees
     * @return JsonResponse
     */
    public function getEmployeesAction()
    {
        return new JsonResponse($this->employeeListService->listAll([
            'limit' => 10
        ]));
    }

    /**
     * create employee
     * @param Request $request
     * @return JsonResponse
     */
    public function postEmployeesAction(Request $request)
    {
        $this->employeeMngService->create(new CreateInput(
            $request->get('user_id', null),
            $request->get('role', null),
            $request->get('user', null),
            $request->get('password', null)
        ));

        return new JsonResponse([
            'ok' => true,
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function postEmployeesAuthenticateAction(Request $request)
    {
        $token = $this->employeeListService->auth(
            $request->get('user', ''),
            $request->get('password', '')
        );
        return new JsonResponse([
            'token' => $token,
        ]);
    }

    /**
     * change user name
     * @param Request $request
     * @param $employeeId
     * @return JsonResponse
     */
    public function putEmployeeUsernameAction(Request $request, $employeeId)
    {
        $this->employeeMngService->changeUser(
            $request->get('user_id', ''),
            $request->get('new_username', ''),
            $request->get('password', '')
        );
        return new JsonResponse([
            'ok' => true
        ]);
    }

    /**
     * change password
     * @param Request $request
     * @param $employeeId
     * @return JsonResponse
     */
    public function putEmployeePasswordAction(Request $request, $employeeId)
    {
        return new JsonResponse([
            'ok' => true
        ]);
    }

    /**
     * change role
     * @param Request $request
     * @param $employeeId
     * @return JsonResponse
     */
    public function putEmployeeRoleAction(Request $request, $employeeId)
    {
        return new JsonResponse([
            'ok' => true
        ]);
    }
}
