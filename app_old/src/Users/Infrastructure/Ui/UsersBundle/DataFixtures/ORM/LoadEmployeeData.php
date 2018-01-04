<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as FakerFactory;
use Misa\Users\Domain\Employee\Employee;
use Misa\Users\Domain\User;
use Misa\Users\Domain\Employee\EmployeeRole;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * LoadEmployeeData Class
 *
 * @package Misa\Users\Infrastructure\Ui\UsersBundle\DataFixtures\ORM
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class LoadEmployeeData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $encrypt = $this->container->get('misa.encrypt.service');
        $password = $this->container->get('Misa\Common\Service\PasswordService');

        $faker = FakerFactory::create('es_PE');

        /**
         * generamos al usuario admin
         */
        $userAdmin = $manager->find('Misa\Users\Domain\User', '4d06bca6-017e-496b-97d8-dbb6d64dc4ed');
        $employee = Employee::create(
            $userAdmin,
            $encrypt->encrypt('user-admin'),
            $password->create(Employee::PASSWORD_DEFAULT),
            EmployeeRole::ADMIN
        );
        $manager->persist($userAdmin);
        $manager->persist($employee);


        /**
         * generamos el resto de empleados
         */
        for ($i = 0; $i < 20; $i++) {
            $user = User::create($faker->firstName, $faker->lastName, $faker->lastName, $this->getUuid($i));
            $employee = Employee::create(
                $user,
                $encrypt->encrypt($this->getUuid($i)),
                $password->create(Employee::PASSWORD_DEFAULT)
            );
            $manager->persist($user);
            $manager->persist($employee);
        }
        $manager->flush();
    }

    private function getUuid($num)
    {
        $data = [
            "f35c8df3-0a79-49b3-bcfe-5c945c70ae68",
            "3b4880dd-6462-451e-a38f-2e635a4cb22d",
            "6ed1054d-33a2-4720-bd6b-b8bd67643506",
            "f93b5836-5e1f-47cc-8ffa-50ce1d477a3b",
            "5fd66e97-202b-4d93-ac9e-09f70449f5a9",
            "a4ecfc51-35c7-4dc1-b220-6ab5fa8ed6b7",
            "6d02c91a-d280-4564-a7ba-9b43c08c746f",
            "4e53eff3-f6f4-4795-8d12-e2aff2433dc5",
            "94c60654-fa6b-4730-97ba-01fbd3d1e6c6",
            "8c06c72f-d672-47e3-a1ce-9661f0b08c72",
            "d90c0912-7f04-4502-a068-462ef6ad7995",
            "3622c9a2-e88e-47da-b02c-b73ee6e1de43",
            "662fc8bb-f96d-4e1a-a439-4caad1e0b6d6",
            "23a0fb90-ce4e-426c-8c4e-d5a1c4582ed7",
            "92ede930-15a1-4934-9cc9-8c5b28b08c73",
            "69649a2f-d111-4c12-8127-fbdb5a5fe437",
            "b6fe2f93-accb-48af-9332-ef463595960a",
            "f03c9771-0df7-4e70-bbe8-56ed86ad3551",
            "59a9a590-4592-48b8-95ff-a4895dc0b796",
            "993fe305-e1d4-4aa2-8bdc-e4bf60f513e5",
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
        return 2;
    }
}
