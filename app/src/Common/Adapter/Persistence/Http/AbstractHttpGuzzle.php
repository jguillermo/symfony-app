<?php

namespace Misa\Common\Adapter\Persistence\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Exception;
/**
 * AbstractHttpService Class
 *
 * @package Misa\Common\Adapter\Persistence\Http
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AbstractHttpGuzzle
{
    protected $client;
    protected $logger;

    public function __construct(
        Client $client,
        LoggerInterface $logger = null)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function decodeJson(ResponseInterface $response, $asArray = true)
    {
        return json_decode($response->getBody()->getContents(), $asArray);
    }

    /**
     * Metodo que se encarga de parsear las excepciones del servicio.
     *
     *  - Si el servicio retorna errores personalizados, estos se tienen que mostrar.
     *  - En el caso que el error no se encuentre mapeado, se devuelve
     *    un mensaje por defecto.
     *
     * @param Exception $ex
     * @param String $defaultMessage
     * @param int $defaultCode
     * @return array
     */
    protected function parseException(
        Exception $ex,
        $defaultMessage = 'Ocurrio un error inesperado. Intente nuevamente.',
        $defaultCode = 500)
    {
        $code = $defaultCode;
        $message = $defaultMessage;

        if ($ex instanceof RequestException) {
            /**
             * En caso que el servicio envie un mensaje personalizado.
             */
            $response = $ex->getResponse();
            $code = $response->getStatusCode();

            if (in_array($code, [400, 401, 403])) {
                $data    = json_decode($response->getBody()->getContents(), true);
                $message = $data['message'];
                $code    = (int) $data['code'];
            }
        }

        return [$code, $message];
    }
}