<?php

namespace App\Repository;

use App\Entity\GroupUserPermission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GroupUserPermission|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupUserPermission|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupUserPermission[]    findAll()
 * @method GroupUserPermission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupUserPermissionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupUserPermission::class);
    }

//    /**
//     * @return GroupUserPermission[] Returns an array of GroupUserPermission objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupUserPermission
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
