<?php

namespace App\Repository;

use App\Entity\TransportAgency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TransportAgency|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransportAgency|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransportAgency[]    findAll()
 * @method TransportAgency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransportAgencyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TransportAgency::class);
    }

//    /**
//     * @return TransportAgency[] Returns an array of TransportAgency objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransportAgency
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
