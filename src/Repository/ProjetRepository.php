<?php

// src/Repository/ProjetRepository.php

namespace App\Repository;

use App\Entity\Projet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projet::class);
    }

    public function findTopProjects(int $limit): array
{
    $qb = $this->createQueryBuilder('p')
        ->orderBy('p.prix', 'DESC')
        ->setMaxResults($limit);

    return $qb->getQuery()->getResult();
}

}
