<?php

namespace Misa\Common\Adapter\Persistence\Solr;

use Solarium\Client;
/**
 * SolrRepository Class
 *
 * @package Misa\Common\Adapter\Persistence\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AbstractSolrRepository
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getSelect(array $options = [])
    {
        return $this->client->createSelect($options);
    }

    public function getUpdate($options = null)
    {
        return $this->client->createUpdate($options);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function suggesterBy($where, $limit = null, $order = null)
    {
        $key = key($where);
        $value = $where[$key];

        $select = $this->getSelect();
        $select->setQuery("$key:(*$value*)");

        $limit && $select->setStart(0)->setRows($limit);
        $order && $select->addSorts($order);


        return $this->getClient()->suggester($select);
    }
}