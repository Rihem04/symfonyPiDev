<?php

namespace App\Repository;

use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Twilio\Rest\Client;

/**
 * @extends ServiceEntityRepository<Reclamation>
 *
 * @method Reclamation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reclamation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reclamation[]    findAll()
 * @method Reclamation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

    public function save(Reclamation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Reclamation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Reclamation[] Returns an array of Reclamation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reclamation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }


public function order_By_Email()
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.email', 'ASC')
            ->getQuery()->getResult();
    }
    public function order_By_Description()
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.description', 'ASC')
            ->getQuery()->getResult();
    }


public function searchByEmail($email)
    {
    return $this->createQueryBuilder('t')
        ->andWhere('t.email LIKE :email')
        ->setParameter('email', '%'.$email.'%')
        ->getQuery()
        ->getResult();
    }

    public function sms(){
        // Your Account SID and Auth Token from twilio.com/console
                $sid = 'ACe3fab32626e0005a40df827758047ad7';
                $auth_token = '359c37415a47f1d593f54ffac24f9bb4';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
        // A Twilio number you own with SMS capabilities
                $twilio_number = "+16073262205";
        
                $client = new Client($sid, $auth_token);
                $client->messages->create(
                // the number you'd like to send the message to
                    '+21651932225',
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => '+16073262205',
                        // the body of the text message you'd like to send
                        'body' => 'Un reclamation a été ajoutée'
                    ]
                );
            }
}
