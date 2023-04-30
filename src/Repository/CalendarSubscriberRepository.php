<?php

namespace App\Repository;

use App\Entity\CalendarSubscriber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CalendarSubscriber>
 *
 * @method CalendarSubscriber|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalendarSubscriber|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalendarSubscriber[]    findAll()
 * @method CalendarSubscriber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendarSubscriberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalendarSubscriber::class);
    }

    public function save(CalendarSubscriber $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CalendarSubscriber $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CalendarSubscriber[] Returns an array of CalendarSubscriber objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CalendarSubscriber
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
