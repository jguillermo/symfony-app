<?php

namespace Misa\Users\Infrastructure\SearchEngine\Solr;

use Misa\Common\Adapter\Persistence\Solr\AbstractSolrRepository;
use Misa\Users\Domain\UserSearchRepository;

/**
 * UserSolrRepository Class
 *
 * @package Misa\Users\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UserSolrRepository extends AbstractSolrRepository implements UserSearchRepository
{

    /**
     * @param array $filter
     * @return array
     */
    public function listAll($filter)
    {
        $select = $this->client->createSelect();

        $fq = "location_province_name:*jj*";
        $select->createFilterQuery('fghfghfgh')->setQuery($fq);

        $resultset = $this->client->select($select);
        $data = [];
        foreach ($resultset as $key => $document) {
            $data[$key] = [];
            foreach ($document as $field => $value) {
                if (is_array($value)) {
                    $value = implode(', ', $value);
                }
                $data[$key][$field] = $value;
            }
        }
        return $data;
    }
}