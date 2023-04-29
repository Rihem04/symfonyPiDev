<?php

namespace App\Repository;

use App\Entity\DemandeClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeClient>
 *
 * @method DemandeClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeClient[]    findAll()
 * @method DemandeClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeClient::class);
    }

    public function save(DemandeClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DemandeClient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return DemandeClient[] Returns an array of DemandeClient objects
     */
    public function findmesdemandes($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.idClient = :val')
            ->setParameter('val', $value)
            ->orderBy('d.dateLimite', 'ASC')
            ->getQuery()
            ->getResult();
    }
    public function findmesoffredetravail($value): array
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.idFreelance = :val')
            ->orderBy('d.dateCreation', 'DESC')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?DemandeClient
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
