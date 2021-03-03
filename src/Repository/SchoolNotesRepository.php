<?php

namespace App\Repository;

use App\Entity\SchoolNotes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SchoolNotes|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchoolNotes|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchoolNotes[]    findAll()
 * @method SchoolNotes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolNotesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchoolNotes::class);
    }

    // /**
    //  * @return SchoolNotes[] Returns an array of SchoolNotes objects
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
    public function findOneBySomeField($value): ?SchoolNotes
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
