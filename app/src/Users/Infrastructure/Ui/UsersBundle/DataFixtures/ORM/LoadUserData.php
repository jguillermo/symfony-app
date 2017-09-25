<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Misa\Users\Domain\User;

/**
 * LoadUserData Class
 *
 * @package Misa\Users\Infrastructure\Ui\UsersBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = FakerFactory::create('es_PE');

        /**
         * usuario admin de la aplicacion
         */
        $userAdmin = User::create(
            'José',
            'Guillermo',
            'Inche',
            '4d06bca6-017e-496b-97d8-dbb6d64dc4ed'
        );
        $manager->persist($userAdmin);

        /**
         * se crean 3 user, que tengan el mismo nombre app apm para busquedas en solr
         */
        $user = User::create($faker->firstName, $faker->lastName, 'Melissa');
        $manager->persist($user);

        $user = User::create('Melissa', $faker->lastName, $faker->lastName);
        $manager->persist($user);

        $user = User::create($faker->firstName, 'Melissa', $faker->lastName);
        $manager->persist($user);


        /**
         * se genera una lista de personas
         */
        for ($i = 0; $i < 20; $i++) {
            $user = User::create($faker->firstName, $faker->lastName, $faker->lastName, $this->getUuid($i));
            $manager->persist($user);
        }
        $manager->flush();
    }

    private function getUuid($num)
    {
        $data = [
            "829f598c-00a9-4332-888c-a5c1d476a308",
            "ad50d237-d25b-479e-98a8-247f1c4f9d82",
            "727fa4af-71e7-4243-860a-48672168af80",
            "f7ac14e1-ab2b-43eb-952a-2b6b3b9fb4c4",
            "404aeb78-8c0c-4605-8ae2-cc73d0439488",
            "50718151-eb1a-4822-b304-ede1a74d1397",
            "21928a93-ca30-49f9-8fce-38d3d8487655",
            "730af218-2519-4747-95d1-199da3377a9d",
            "c3dce403-f711-4633-8b0a-46dcba350776",
            "869604a0-a4c1-407c-97df-768f56150fe2",
            "b900cdd1-dcef-4929-83a0-37c66984a791",
            "2869e5e7-56c8-49fd-b1b7-c14090b666fd",
            "5968db0b-9746-4fd0-9b34-8b6ba8dbdf37",
            "dd198978-c22f-46df-b811-902d5efc518e",
            "18f13712-8f61-4b67-b17b-8564785fd67a",
            "0d602fe8-8910-463d-a956-2e3b5643947e",
            "d5ac3341-c71d-4d03-bc0c-423d44779e53",
            "cd0564ec-1c56-4c5b-9c32-9194f96ef928",
            "16dc0d05-27ba-47e2-8cab-6f00e6a001a1",
            "c5c6de51-afc3-42ff-9192-fa3957b3a520",
        ];

        return $data[$num];
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}
