<?php

namespace App\Repository;

use App\Entity\Scorecard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scorecard|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scorecard|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scorecard[]    findAll()
 * @method Scorecard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScorecardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scorecard::class);
    }

    // /**
    //  * @return Scorecard[] Returns an array of Scorecard objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scorecard
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
