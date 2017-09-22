<?php

namespace Misa\Users\Infrastructure\SearchEngine\Solr;

use Misa\Common\Adapter\Persistence\Http\AbstractHttpGuzzle;
use Misa\Common\Exception\BadRequest;

/**
 * UserHttpRepository Class
 *
 * @package Misa\Users\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UserHttpRepository extends AbstractHttpGuzzle
{
    public function indexdata()
    {
        try {
            $response = $this->client->get("user/select?indent=on&q=*:*&wt=json");
            //dump($response->getStatusCode());
            return $this->decodeJson($response);
        } catch (\Exception $e) {
            new BadRequest("no se pudo obtener la data");
        }
    }
}