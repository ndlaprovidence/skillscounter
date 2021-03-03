<?php

namespace App\Repository;

use App\Entity\Schoolsubjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Schoolsubjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schoolsubjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schoolsubjects[]    findAll()
 * @method Schoolsubjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolsubjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schoolsubjects::class);
    }

    // /**
    //  * @return Schoolsubjects[] Returns an array of Schoolsubjects objects
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
    public function findOneBySomeField($value): ?Schoolsubjects
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
