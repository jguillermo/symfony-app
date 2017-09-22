<?php

namespace Misa\Users\Infrastructure\SearchEngine\Solr;

use Misa\Common\Adapter\Persistence\Solr\AbstractSolrRepository;
use Faker\Factory as FakerFactory;

/**
 * UserSolrRepository Class
 *
 * @package Misa\Users\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class EmployeeSolrRepository extends AbstractSolrRepository
{
    public function indexData($listIds)
    {

        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 300);

        //'fq={!join from=userId fromIndex=employee to=id}role:2';
        $updateEmployee = $this->getUpdate();
        $dataInsertEmployee=[];
        foreach ($listIds as $userId){
                $doc2 = $updateEmployee->createDocument();
                $doc2->userId = $userId;
                $doc2->role = rand(1,2);
                $dataInsertEmployee[]=$doc2;
        }

        $updateEmployee->addDocuments($dataInsertEmployee);
        $updateEmployee->addCommit();
        $result = $this->getClient()->update($updateEmployee);

        return ['status'=>$result->getStatus(),'time'=>$result->getQueryTime()];
    }
}