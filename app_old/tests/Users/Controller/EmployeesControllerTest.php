<?php

namespace MisaTests\Users\Controller;

use Misa\Common\Test\CodeHttpException;
use Misa\Common\Test\MisaIntegrationTest;
use Ramsey\Uuid\Uuid;

/**
 * EmployeesControllerTest Class
 *
 * @package Misa\Users\Infrastructure\Ui\UsersBundle\Tests\Controller
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeesControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'users/employees';
    }

    public function testgetOneEmployee()
    {

        $employeeId = '4d06bca6-017e-496b-97d8-dbb6d64dc4ed';
        $response = $this->request('GET', $this->getUrl($employeeId));
        $dataEmployee = $response->body();

        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals($dataEmployee['id'], '4d06bca6-017e-496b-97d8-dbb6d64dc4ed');
        $this->assertEquals($dataEmployee['name'], 'José');
        $this->assertEquals($dataEmployee['last_name'], 'Guillermo');
        $this->assertEquals($dataEmployee['role'], 'Admin');
    }

    public function testCreateEmployeeExist()
    {
        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(500);
        $response = $this->request('POST', $this->getUrl(), [
            'user_id' => 'f35c8df3-0a79-49b3-bcfe-5c945c70ae68',
            'role' => 1,
            'user' => Uuid::uuid4(),
            'password' => 'password'
        ]);
    }

    public function testCreateEmployee()
    {
        $userId = $this->createUser();

        $response = $this->request('POST', $this->getUrl(), [
            'user_id' => $userId,
            'role' => 1,
            'user' => Uuid::uuid4(),
            'password' => 'password'
        ]);
        $this->assertEquals(200, $response->statusCode());

        $responseEmployee = $this->request('GET', $this->getUrl($userId));
        $dataEmployee = $responseEmployee->body();
        $this->assertEquals(200, $responseEmployee->statusCode());

        return $userId;
    }

    /**
     * @depends testCreateEmployee
     */
    public function testCreateEmployeeDuplicado($userId)
    {
        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(500);
        $response = $this->request('POST', $this->getUrl(), [
            'user_id' => $userId,
            'role' => 1,
            'user' => Uuid::uuid4(),
            'password' => 'password'
        ]);
    }

    public function testCrearConUsuarioDuplicado()
    {
        $userId = $this->createUser();

        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('el nombre de usuario no esta disponible');
        $response = $this->request('POST', $this->getUrl(), [
            'user_id' => $userId,
            'role' => 1,
            'user' => 'f35c8df3-0a79-49b3-bcfe-5c945c70ae68', // este usuario se sacó de DataFixtures
            'password' => 'password'
        ]);
    }

    public function testAuthSuccess()
    {
        $response = $this->request('POST', $this->getUrl('authenticate'), [
            'user' => '94c60654-fa6b-4730-97ba-01fbd3d1e6c6', // este usuario se sacó de DataFixtures
            'password' => '123456'
        ]);
        $data = $response->body();
        $this->assertEquals(200, $response->statusCode());
        $this->assertTrue(isset($data['token']));
        $session = $this->jwtDecode($data['token']);
        $this->assertEquals($session['role'], 2);
        // es este caso de ejmplo el user y el id son iguales
        // porque asi se creo en el datafixtures
        $this->assertEquals($session['id'], '94c60654-fa6b-4730-97ba-01fbd3d1e6c6');
    }

    public function testAuthError()
    {
        $this->expectException(CodeHttpException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('el usuario o password no es correcto');
        $response = $this->request('POST', $this->getUrl('authenticate'), [
            'user' => 'f35c8df3-0a79-49b3-bcfe',
            'password' => 'password'
        ]);
    }

    public function testChangeUser()
    {
        $userId = $this->createEmployee();

        $newUserName = Uuid::uuid4();

        $response = $this->request('PUT', $this->getUrl($userId.'/username'), [
            'user_id' => $userId,
            'new_username' => $newUserName,
            'password' => 'password'
        ]);
        $this->assertEquals(200, $response->statusCode());

        $responseAuth = $this->request('POST', $this->getUrl('authenticate'), [
            'user' => $newUserName,
            'password' => 'password'
        ]);
        $data = $responseAuth->body();
        $session = $this->jwtDecode($data['token']);
        $this->assertEquals($session['id'], $userId);
    }

    private function createEmployee($role = 1)
    {
        $userId = $this->createUser();
        $response = $this->request('POST', $this->getUrl(), [
            'user_id' => $userId,
            'role' => $role,
            'user' => $userId,
            'password' => 'password'
        ]);
        return $userId;
    }

    private function createUser()
    {
        $dataResponse = $this->request('POST', '/v1/users/users', [
            'name' => 'Joselll',
            'last_name' => 'guillermolll',
            'second_last_name' => 'Inchelll',
        ]);
        $data = $dataResponse->body();
        return $data['user_id'];
    }


    private function jwtDecode($txt)
    {
        $data = explode('.', $txt);
        $input = $data[1];
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $input .= str_repeat('=', $padlen);
        }
        $decode = base64_decode(strtr($input, '-_', '+/'));
        $data = json_decode($decode, true);
        return $data['data'];
    }
}
