<?php

namespace Misa\Common\Service;

use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

/**
 * EncryptImplement class
 *
 * @package MisaCore\Domain
 * @subpackage Base\Implement
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2016, Getmin
 */

class PasswordService
{
    const COST = 15;

    /**
     * genera un password con encriptacion
     * @param string $password
     * @return string
     */
    public function create($password)
    {
        $bcrypt = new BCryptPasswordEncoder(self::COST);
        return $bcrypt->encodePassword($password, null);
    }

    /**
     * compara elpassword ingresao, con el almacenado en un repositorio
     * @param string $password ingresado por el usuario
     * @param string $securePass almacenado en un repositorio
     * @return bool
     */
    public function verify($password, $securePass)
    {
        $bcrypt = new BCryptPasswordEncoder(self::COST);
        return $bcrypt->isPasswordValid($password, $securePass, null);
    }
}
