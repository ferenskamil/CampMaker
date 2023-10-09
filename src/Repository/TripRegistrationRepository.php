<?php

namespace App\Repository;

use App\Entity\TripRegistration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TripRegistration>
 *
 * @method TripRegistration|null find($id, $lockMode = null, $lockVersion = null)
 * @method TripRegistration|null findOneBy(array $criteria, array $orderBy = null)
 * @method TripRegistration[]    findAll()
 * @method TripRegistration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripRegistrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TripRegistration::class);
    }

//    /**
//     * @return TripRegistration[] Returns an array of TripRegistration objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TripRegistration
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
