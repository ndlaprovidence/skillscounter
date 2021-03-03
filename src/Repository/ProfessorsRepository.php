<?php

namespace App\Repository;

use App\Entity\Professors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Professors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Professors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Professors[]    findAll()
 * @method Professors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfessorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Professors::class);
    }

    // /**
    //  * @return Professors[] Returns an array of Professors objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Professors
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
