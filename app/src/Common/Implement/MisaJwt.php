<?php

namespace Misa\Common\Implement;

use Misa\Common\Exception\AppException;
use Misa\Common\Service\Auth0;
use Firebase\JWT\JWT as FireBaseJWT;

/**
 * Jwt Class
 *
 * @package Misa\Common\Service
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MisaJwt implements Auth0
{
    private $key;
    const ENCRYPTION_ALGORITHM = 'HS256';

    /**
     * AptJwt constructor.
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * {@inheritdoc}
     */
    public function encode(array $data, $ttl = 300)
    {
        $issuedAt = time();
        $notBefore = $issuedAt + FireBaseJWT::$leeway;             // Adding 10 seconds
        $expire = $notBefore + $ttl;       // Adding 1 hour , 60*60
        $token = [
            'iat' => $issuedAt,         // Issued at: time when the token was generated
            'nbf' => $notBefore,        // Not before
            'exp' => $expire,           // Expire
            'data' => $data
        ];
        return FireBaseJWT::encode($token, $this->key, self::ENCRYPTION_ALGORITHM);
    }

    /**
     * {@inheritdoc}
     */
    public function decode($jwt)
    {
        try {
            $decode = FireBaseJWT::decode($jwt, $this->key, [self::ENCRYPTION_ALGORITHM]);
            $result = (array)$decode->data;
        } catch (\Exception $e) {
            throw new AppException("no se pudo leer la información del token", 500, $e);
        }
        return $result;
    }
}
