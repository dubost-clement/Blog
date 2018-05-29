<?php

namespace App\Repository;

use App\Entity\Reportage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Reportage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reportage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reportage[]    findAll()
 * @method Reportage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReportageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Reportage::class);
    }

//    /**
//     * @return Reportage[] Returns an array of Reportage objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reportage
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
