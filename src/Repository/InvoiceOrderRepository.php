<?php

namespace App\Repository;

use App\Entity\InvoiceOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InvoiceOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceOrder[]    findAll()
 * @method InvoiceOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceOrderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InvoiceOrder::class);
    }

//    /**
//     * @return InvoiceOrder[] Returns an array of InvoiceOrder objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InvoiceOrder
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
