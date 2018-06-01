<?php

namespace App\Repository;

use App\Entity\InvoiceOrderProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InvoiceOrderProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvoiceOrderProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvoiceOrderProducts[]    findAll()
 * @method InvoiceOrderProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceOrderProductsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InvoiceOrderProducts::class);
    }

//    /**
//     * @return InvoiceOrderProducts[] Returns an array of InvoiceOrderProducts objects
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
    public function findOneBySomeField($value): ?InvoiceOrderProducts
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
