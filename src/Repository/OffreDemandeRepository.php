<?php

namespace App\Repository;

use App\Entity\OffreDemande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OffreDemande>
 *
 * @method OffreDemande|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffreDemande|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffreDemande[]    findAll()
 * @method OffreDemande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreDemandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffreDemande::class);
    }

    public function save(OffreDemande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OffreDemande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function findmesoffrede($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.id_freelance = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
    //    /**
    //     * @return OffreDemande[] Returns an array of OffreDemande objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?OffreDemande
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
