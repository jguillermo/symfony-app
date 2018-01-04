<?php

namespace MisaTests\Users\Controller;

use Misa\Common\Test\CodeHttpException;
use Misa\Common\Test\MisaIntegrationTest;
use Ramsey\Uuid\Uuid;

class UsersControllerTest extends MisaIntegrationTest
{

    protected function getStaticUrl()
    {
        return 'users/users';
    }

    public function testGetOneUser()
    {
        $response = $this->request('GET', $this->getUrl('4d06bca6-017e-496b-97d8-dbb6d64dc4ed'));

        $dataUser = $response->body();
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals($dataUser['id'], '4d06bca6-017e-496b-97d8-dbb6d64dc4ed');
        $this->assertEquals($dataUser['name'], 'José');
        $this->assertEquals($dataUser['last_name'], 'Guillermo');
        $this->assertEquals($dataUser['second_last_name'], 'Inche');
    }

    public function testGetOneUserNoExist()
    {
        $this->expectException(CodeHttpException::class);
        $response = $this->request('GET', $this->getUrl('14c48f0e-fa7d-4e65-91e5-4cecebe5cdf4'));
    }

    public function testIndex()
    {
        //$this->expectException(CodeHttpException::class);
        $response = $this->request('GET', $this->getUrl());
        $this->assertCount(10, $response->body());
        $this->assertEquals(200, $response->statusCode());
    }

    public function testCreateUser()
    {
        $dataResponse = $this->request('POST', $this->getUrl(), [
            'name' => 'Jose',
            'last_name' => 'guillermo',
            'second_last_name' => 'Inche',
        ]);

        $data = $dataResponse->body();

        $this->assertTrue(isset($data['user_id']));
        $this->assertTrue(Uuid::isValid($data['user_id']));

        $userResponse = $this->request('GET', $this->getUrl($data['user_id']));

        $dataUser = $userResponse->body();
        $this->assertEquals(200, $userResponse->statusCode());
        $this->assertEquals($dataUser['id'], $data['user_id']);
        $this->assertEquals($dataUser['name'], 'Jose');
        $this->assertEquals($dataUser['last_name'], 'guillermo');
        $this->assertEquals($dataUser['second_last_name'], 'Inche');
    }

    public function testUpdateUserErrorNoExist()
    {
        $id = '6b1ac1f8-790c-48ba-966b-a92d2e5b54f4';

        try {
            $response = $this->request('PUT', $this->getUrl($id), [
                'name' => 'Jose2',
                'last_name' => 'guillermo2',
                'second_last_name' => 'Inche2',
            ]);
            $this->assertEquals('no debe entrar a esta linea', 'algo paso, el id no debe existir');
        } catch (CodeHttpException $ex) {
            $this->assertEquals('500', $ex->getCode());
        }
    }


    public function testUpdateUserOkAllParams()
    {
        /**
         * insert New User
         */
        $inserResponse = $this->request('POST', $this->getUrl(), [
            'name' => 'Jose',
            'last_name' => 'guillermo',
            'second_last_name' => 'Inche',
        ]);
        $idUser = $inserResponse->body('user_id');


        /** update user all params */
        $updateResponse = $this->request('PUT', $this->getUrl($idUser), [
            'name' => 'Jose2',
            'last_name' => 'guillermo2',
            'second_last_name' => 'Inche2',
        ]);


        /** get User and compare items */
        $getResponse = $this->request('GET', $this->getUrl($idUser));
        $dataUser = $getResponse->body();
        $this->assertEquals($dataUser['id'], $idUser);
        $this->assertEquals($dataUser['name'], 'Jose2');
        $this->assertEquals($dataUser['last_name'], 'guillermo2');
        $this->assertEquals($dataUser['second_last_name'], 'Inche2');
    }

    public function testDeleteUser()
    {
        /**
         * insert New User
         */
        $inserResponse = $this->request('POST', $this->getUrl(), [
            'name' => 'Jose',
            'last_name' => 'guillermo',
            'second_last_name' => 'Inche',
        ]);
        $idUser = $inserResponse->body('user_id');


        /**
         * borrando un usuario
         */
        $deleteResponse = $this->request('DELETE', $this->getUrl($idUser));
        $this->assertEquals(200, $deleteResponse->statusCode());

        $this->expectException(CodeHttpException::class);
        $response = $this->request('GET', $this->getUrl('14c48f0e-fa7d-4e65-91e5-4cecebe5cdf4'));
    }
}
