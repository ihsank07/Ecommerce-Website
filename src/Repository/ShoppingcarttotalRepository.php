<?php

namespace App\Repository;

use App\Entity\Shoppingcarttotal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Shoppingcarttotal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shoppingcarttotal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shoppingcarttotal[]    findAll()
 * @method Shoppingcarttotal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoppingcarttotalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shoppingcarttotal::class);
    }

    // /**
    //  * @return Shoppingcarttotal[] Returns an array of Shoppingcarttotal objects
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
    public function findOneBySomeField($value): ?Shoppingcarttotal
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
