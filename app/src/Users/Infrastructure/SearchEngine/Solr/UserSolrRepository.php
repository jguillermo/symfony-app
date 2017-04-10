<?php

namespace Misa\Users\Infrastructure\SearchEngine\Solr;

use Misa\Common\Adapter\Persistence\Solr\AbstractSolrRepository;
use Misa\Users\Domain\User;
use Faker\Factory as FakerFactory;

/**
 * UserSolrRepository Class
 *
 * @package Misa\Users\Infrastructure\SearchEngine\Solr
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class UserSolrRepository extends AbstractSolrRepository
{
    public function indexData()
    {

        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 300);

        $updateUser = $this->getUpdate();
        $faker = FakerFactory::create('es_PE');
        $dataInsertUser=[];
        $dataInsertEmployee=[];
        for ($i=0;$i<10000;$i++){
            $userId = User::uuid()->getId();
            $name = (($i % 2) == 0)? $faker->firstName: $faker->firstName.' '.$faker->firstName;
            $doc1 = $updateUser->createDocument();
            $doc1->id = $userId;
            $doc1->name = $name;
            $doc1->lastName = $faker->lastName;
            $doc1->secondLastName = $faker->lastName;

            $aptitudes = range(rand(1,20), rand(30,50), rand(1,6));

            $doc1->aptitudes_int = $aptitudes;
            $doc1->aptitudes_str = $aptitudes;
            $dataInsertUser[]=$doc1;
            if(($i % 3)==0){
                $dataInsertEmployee[]=$userId;
            }
        }

        $updateUser->addDocuments($dataInsertUser);
        $updateUser->addCommit();
        $result = $this->getClient()->update($updateUser);
        return $dataInsertEmployee;
    }
}