<?php

namespace App\Repository;

use App\Entity\DemandeOffre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeOffre>
 *
 * @method DemandeOffre|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeOffre|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeOffre[]    findAll()
 * @method DemandeOffre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeOffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeOffre::class);
    }

    public function save(DemandeOffre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DemandeOffre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function findmesoffrede($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.idFreelance = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    public function findAccepted(): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.reponseDemande = :val')
            ->setParameter('val', 'Accepté')
            ->getQuery()
            ->getResult();
    }



    //    /**
    //     * @return DemandeOffre[] Returns an array of DemandeOffre objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DemandeOffre
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
