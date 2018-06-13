<?php

namespace DI\PlatformBundle\Repository;

/**
 * AdvertRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdvertRepository extends \Doctrine\ORM\EntityRepository
{


    public function myFindAll() {
        // equivalent de SELECT * FROM Advert
        return $this->createQueryBuilder('a')->getQuery();
    }

    /*
    public function myFindOne($id) {
        // 'SELECT * FROM Advert a WHERE a.id = '.$id;
        $qb = $this->createQueryBuilder('a');
        $qb->where('a.id = :id')
        ->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }
    */

    public function getAdvertWithApplications($id) {
        $qb = $this->createQueryBuilder('a');
        $qb->leftJoin('a.applications', 'app');
        $qb->addSelect('app');

        return $qb->getQuery()->getResult();


       // return $this->createQueryBuilder('a')->leftJoin('a.application', 'app')->addSelect('app')->getQuery()->getResult();

    }


}
