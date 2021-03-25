<?php

namespace App\Repository;

use App\Entity\NoteSimulation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoteSimulation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteSimulation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteSimulation[]    findAll()
 * @method NoteSimulation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteSimulationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteSimulation::class);
    }

    // /**
    //  * @return NoteSimulation[] Returns an array of NoteSimulation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoteSimulation
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
