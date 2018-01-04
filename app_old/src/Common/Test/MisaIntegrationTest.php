<?php

namespace Misa\Common\Test;

use phpDocumentor\Reflection\Types\Self_;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * MisaIntegrationTest Class
 *
 * @package Misa\Common\Test
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
abstract class MisaIntegrationTest extends WebTestCase
{
    const API_VERSION = 'v1';

    /**
     * trasforma la respuesta json a un array y retorna el status code
     * @param $method
     * @param $uri
     * @param array $parameters
     * @return MisaTestResponse
     * @throws CodeHttpException
     */
    public function request($method, $uri, $parameters = [])
    {
        $client = static::createClient();
        $client->enableProfiler();
        $crawler = $client->request($method, $uri, $parameters, [], [
            'CONTENT_TYPE' => 'application/json',
        ]);

        $data = json_decode($client->getResponse()->getContent(), true);

        $statuscode = $client->getResponse()->getStatusCode();

        $response = new MisaTestResponse($statuscode, $data);

        //var_dump($statuscode,$data);
        if ($statuscode < 200 || $statuscode >= 300) {
            throw new CodeHttpException("error de code". json_encode($response->body()), $response);
        }
        return $response;
    }

    public function getUrl($params = null)
    {
        $param = (is_string($params)) ? '/'.trim($params, '/') : '';
        $staicUrl = $this->getStaticUrl();
        return '/'.self::API_VERSION.'/'.trim($staicUrl, '/').$param;
    }

    abstract protected function getStaticUrl();
}
