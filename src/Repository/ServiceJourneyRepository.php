<?php

namespace App\Repository;

use App\Entity\ServiceJourney;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServiceJourney|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceJourney|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceJourney[]    findAll()
 * @method ServiceJourney[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceJourneyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServiceJourney::class);
    }

//    /**
//     * @return ServiceJourney[] Returns an array of ServiceJourney objects
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
    public function findOneBySomeField($value): ?ServiceJourney
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
