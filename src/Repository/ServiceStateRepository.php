<?php

namespace App\Repository;

use App\Entity\ServiceState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServiceState|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceState|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceState[]    findAll()
 * @method ServiceState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceStateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServiceState::class);
    }

//    /**
//     * @return ServiceState[] Returns an array of ServiceState objects
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
    public function findOneBySomeField($value): ?ServiceState
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
