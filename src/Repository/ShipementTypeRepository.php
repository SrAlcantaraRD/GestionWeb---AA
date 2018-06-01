<?php

namespace App\Repository;

use App\Entity\ShipementType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShipementType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShipementType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShipementType[]    findAll()
 * @method ShipementType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShipementTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShipementType::class);
    }

//    /**
//     * @return ShipementType[] Returns an array of ShipementType objects
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
    public function findOneBySomeField($value): ?ShipementType
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
