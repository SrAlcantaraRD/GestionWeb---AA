<?php

namespace App\Repository;

use App\Entity\StoreClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StoreClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method StoreClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method StoreClient[]    findAll()
 * @method StoreClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoreClientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StoreClient::class);
    }

//    /**
//     * @return StoreClient[] Returns an array of StoreClient objects
//     */
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
    public function findOneBySomeField($value): ?StoreClient
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
