<?php

namespace Misa\Common\Service;

/**
 * AuthEncript Interface
 *
 * @package Misa\Common\Service
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
interface Auth0
{
    /**
     * genera la cadena encriptada con datos
     * @param array $data
     * @param int $ttl tiempo de vida ( en segundos ), por defecto dura 5 minutos
     * @return string
     */
    public function encode(array $data, $ttl = 300);

    /**
     * desencripta la cadena y retorna los datos
     * @param $encript
     * @return array
     */
    public function decode($encript);
}
