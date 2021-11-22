<?php

namespace App\Repository;

use App\Entity\ShoppingCart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShoppingCart|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoppingCart|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoppingCart[]    findAll()
 * @method ShoppingCart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 * @method ShoppingCart[]    getSmall($userid)
 */
class ShoppingCartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShoppingCart::class);
    }

    public function getSmallest($userid)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT MIN(sc.unitprice) as up
            FROM App\Entity\ShoppingCart sc
            WHERE sc.userid=:userid'
        )->setParameter('userid', $userid);

        $qu = $query->getResult();
        return $qu[0]['up'];
    }

    public function getSmallNumbers($userid){
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery('
            SELECT sc.unitprice as up
            FROM App\Entity\ShoppingCart sc
            WHERE sc.userid=:userid
            ORDER BY up ASC')
            ->setParameter('userid', $userid);

            
            $gts = $query->getResult();
            
            //dd($altı);

            return  $gts;

    }   
    public function getTimes($userid){
        $entityManager = $this->getEntityManager();
        $query2= $entityManager->createQuery('
        SELECT sc.quantity as quantity  
        FROM App\Entity\ShoppingCart sc
        WHERE sc.userid=:userid
        ORDER BY sc.unitprice')->setParameter('userid',$userid);
    
        $altı = $query2->getResult(); 

        return $altı;
    
    }



    // /**
    //  * @return ShoppingCart[] Returns an array of ShoppingCart objects
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
    public function findOneBySomeField($value): ?ShoppingCart
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
